<?php

namespace System\Database;

use System\Support\Text;
use Illuminate\Support\Arr;
use System\Types\ListRequest;
use Illuminate\Pagination\Paginator as BasePaginator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Paginator extends BasePaginator
{
    /**
     * Prepare the response using the instance and the request.
     *
     */
    public function format(ListRequest $request) : array
    {
        return [
            'type'        => 'SimplePaginator',
            'data'        => [
                'rows'    => $this->items->toArray(),
                'columns' => $request->columns(),
            ],
            'search'      => [
                'filtering' => $request->filtering(),
                'ordering'  => $request->ordering(),
                'order_key' => $request->orderKey(),
            ],
            'pagination'  => [
                'current_page'   => $this->currentPage(),
                'first_page_url' => $this->url(1),
                'from'           => $this->firstItem(),
                'last_page'      => null,
                'last_page_url'  => null,
                'links'          => null,
                'next_page_url'  => $this->nextPageUrl(),
                'path'           => $this->path(),
                'per_page'       => $this->perPage(),
                'prev_page_url'  => $this->previousPageUrl(),
                'to'             => $this->lastItem(),
                'total'          => null,
                'redirecting'    => $this->redirectToFirstPage($request->query()),
            ],
        ];
    }

    /**
     * Trigger a redirect to the first page of the paginator.
     *
     */
    protected function redirectToFirstPage(array $query) : bool
    {
        if ($this->currentPage() === 1 || $this->items->isNotEmpty()) {
            return false;
        }

        $query = Arr::set($query, $this->pageName, 1);

        $url = Text::of($this->path())
            ->append('?')
            ->append(Arr::query($query))
            ->toString();

        throw new HttpException(307, $url);
    }
}
