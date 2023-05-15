<?php

namespace Caneara\Spine\Database;

use Caneara\Spine\Support\Arr;
use Caneara\Spine\Support\Str;
use Caneara\Spine\Types\ListRequest;
use Caneara\Spine\Exception\TemporaryRedirectException;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class LengthAwarePaginator extends Paginator
{
    /**
     * Prepare the response using the instance and the request.
     *
     */
    public function format(ListRequest $request) : array
    {
        if ($this->currentPage() > $this->lastPage()) {
            $this->redirectToLastPage($request->query());
        }

        return [
            'type'        => 'LengthAwarePaginator',
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
                'last_page'      => $this->lastPage(),
                'last_page_url'  => $this->url($this->lastPage()),
                'links'          => $this->linkCollection()->toArray(),
                'next_page_url'  => $this->nextPageUrl(),
                'path'           => $this->path(),
                'per_page'       => $this->perPage(),
                'prev_page_url'  => $this->previousPageUrl(),
                'to'             => $this->lastItem(),
                'total'          => $this->total(),
            ],
        ];
    }

    /**
     * Trigger a redirect to the last page of the paginator.
     *
     */
    protected function redirectToLastPage(array $query) : void
    {
        $query[$this->pageName] = $this->lastPage();

        $url = Str::of($this->path())
            ->append('?')
            ->append(Arr::query($query))
            ->toString();

        throw new TemporaryRedirectException($url);
    }
}
