<?php

namespace Caneara\Spine\Database;

use Caneara\Spine\Types\TableRequest;
use Illuminate\Pagination\Paginator as BasePaginator;

class Paginator extends BasePaginator
{
    /**
     * Prepare the response using the instance and the request.
     *
     */
    public function format(TableRequest $request) : array
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
            ],
        ];
    }
}
