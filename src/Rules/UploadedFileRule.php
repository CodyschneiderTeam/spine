<?php

namespace System\Rules;

use Exception;
use System\Types\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UploadedFileRule extends Rule
{
    /**
     * The additional checks to perform.
     *
     */
    protected array $checks = [
        'exists' => null,
        'image'  => null,
        'size'   => null,
        'types'  => null,
    ];

    /**
     * The error message to use.
     *
     */
    protected string $message = '';

    /**
     * Determine if the file exists.
     *
     */
    protected function assertExists(string $value) : bool
    {
        return Storage::missing("tmp/{$value}")
            ? $this->fail('The file does not exist.')
            : true;
    }

    /**
     * Determine if the file has a MIME type that is permitted.
     *
     */
    protected function assertHasMimeType(string $value) : bool
    {
        if (! $this->checks['types']) {
            return true;
        }

        return Collection::make($this->checks['types'])->doesntContain($this->getMimeType($value))
            ? $this->fail('The file must be a ' . Arr::join($this->checks['types'], ', ', ' or '))
            : true;
    }

    /**
     * Determine if the file size exceeds the maximum allowed.
     *
     */
    protected function assertIsLessThanMegabytes(string $value) : bool
    {
        if (! $this->checks['size']) {
            return true;
        }

        return Storage::size("tmp/{$value}") > ($this->checks['size'] * 1_048_576)
            ? $this->fail("The file must be less than {$this->checks['size']} MB.")
            : true;
    }

    /**
     * Determine if the file can be processed as an image.
     *
     */
    protected function assertIsValidImage(string $value) : bool
    {
        if (! $this->checks['image']) {
            return true;
        }

        try {
            return ! ! Image::make(Storage::get("tmp/{$value}"));
        } catch (Exception) {
            return $this->fail(
                "The file could not be processed. Save it as an image in the correct format"
            );
        }
    }

    /**
     * Retrieve the MIME type for the file.
     *
     */
    protected function getMimeType(string $value) : mixed
    {
        if (App::isProduction()) {
            return Storage::mimeType("tmp/{$value}");
        }

        $type = Storage::mimeType("tmp/{$value}");

        return $type ? $type : mime_content_type(Storage::path("tmp/{$value}"));
    }

    /**
     * Ensure that the file has a MIME type within the given types.
     *
     */
    public function hasMimeType(...$types) : static
    {
        $this->checks['types'] = $types;

        return $this;
    }

    /**
     * Ensure that the file is not greater than the given number of megabytes.
     *
     */
    public function isLessThanMegabytes(int $total) : static
    {
        $this->checks['size'] = $total;

        return $this;
    }

    /**
     * Ensure that the file is an image that can be processed.
     *
     */
    public function isValidImage() : static
    {
        $this->checks['image'] = true;

        return $this;
    }

    /**
     * Determine if the validation rule passes.
     *
     */
    public function passes($value) : bool
    {
        $assertions = [
            'assertExists',
            'assertIsLessThanMegabytes',
            'assertHasMimeType',
            'assertIsValidImage',
        ];

        foreach ($assertions as $assertion) {
            if (! $this->{$assertion}($value)) {
                break;
            }
        }

        return ! $this->message;
    }
}
