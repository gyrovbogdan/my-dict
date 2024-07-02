<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginationService
{
    public static function numberInstances(LengthAwarePaginator $paginated)
    {
        $total = $paginated->total();
        $perPage = $paginated->perPage();
        $currentPage = $paginated->currentPage();
        $startIndex = round((($total / $perPage) - $currentPage + 1) * $perPage);

        $paginated->getCollection()->transform(function ($item, $index) use ($startIndex) {
            $item->number = $startIndex - $index;
            return $item;
        });

        return $paginated;
    }
}