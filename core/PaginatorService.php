<?php

namespace Core;

class PaginatorService
{
    public static function getPaginator()
    {
        $page = !empty($_GET[PAGINATOR_PAGE_NAME]) ? intval($_GET[PAGINATOR_PAGE_NAME]) : 0;

        $html = '<div class="clearfix">';
        $html .= '';
        if ($page > 2) {
            $html .= '<a class="btn btn-primary float-left px-2 py-2 rounded-circle" href="?' . PAGINATOR_PAGE_NAME . '=' . ($page - 1) . '"><i class="fas fa-arrow-circle-left h1 p-0 m-0"></i></a>';
        } elseif ($page === 2) {
            $html .= '<a class="btn btn-primary float-left px-2 py-2 rounded-circle" href="' . explode('?', getUri())[0] . '"><i class="fas fa-arrow-circle-left h1 p-0 m-0"></i></a>';
        }

        if ($page > 1) {
            $html .= '<a class="btn btn-primary float-right px-2 py-2 rounded-circle" href="?' . PAGINATOR_PAGE_NAME . '=' . ($page + 1) . '"><i class="fas fa-arrow-circle-right h1 p-0 m-0"></i></a>';
        } else {
            $html .= '<a class="btn btn-primary float-right px-2 py-2 rounded-circle" href="?' . PAGINATOR_PAGE_NAME . '=2"><i class="fas fa-arrow-circle-right h1 p-0 m-0"></i></a>';
        }
        $html .= '</div>';


        $paginatorData = [
            'html'   => $html,
            'limit'  => PAGINATOR_PAGE_RANGE,
            'offset' => in_array($page, [0, 1]) ? 0 : (($page - 1) * PAGINATOR_PAGE_RANGE)
            
        ];
        
        return $paginatorData;
    }
}
