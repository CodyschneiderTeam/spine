<?php

namespace System\Database;

use System\Support\Arr;
use System\Support\Text;
use System\Types\ListRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class LengthAwarePaginator extends Paginator
{
    /**
     * Prepare the response using the instance and the request.
     *
     */
    public function format(ListRequest $request) : array
    {
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
                'redirecting'    => $this->redirectToLastPage($request->query()),
            ],
        ];
    }

    /**
     * Trigger a redirect to the last page of the paginator when appropriate.
     *
     */
    protected function redirectToLastPage(array $query) : bool
    {
        if ($this->currentPage() <= $this->lastPage()) {
            return false;
        }

        $query = Arr::set($query, $this->pageName, $this->lastPage());

        $url = Text::of($this->path())
            ->append('?')
            ->append(Arr::query($query))
            ->toString();

        throw new HttpException(307, $url);
    }
}
