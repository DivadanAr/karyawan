<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Templates
     * --------------------------------------------------------------------------
     *
     * Pagination links are rendered out using views to configure their
     * appearance. This array contains aliases and the view names to
     * use when rendering the links.
     *
     * Within each view, the Pager object will be available as $pager,
     * and the desired group as $pagerGroup;
     *
     * @var array<string, string>
     */
    public $templates = [
        'default_full'   => '<ul class="pagination">{pager}</ul>',
        'default_first'  => '<li class="page-item"><a href="{uri}" class="page-link">{page}</a></li>',
        'default_last'   => '<li class="page-item"><a href="{uri}" class="page-link">{page}</a></li>',
        'default_next'   => '<li class="page-item"><a href="{uri}" class="page-link" aria-label="Next">{page}</a></li>',
        'default_previous' => '<li class="page-item"><a href="{uri}" class="page-link" aria-label="Previous">{page}</a></li>',
        'default_full_first' => '<li class="page-item"><a href="{uri}" class="page-link" aria-label="First">{page}</a></li>',
        'default_full_last' => '<li class="page-item"><a href="{uri}" class="page-link" aria-label="Last">{page}</a></li>',
        'default_full_next' => '<li class="page-item"><a href="{uri}" class="page-link" aria-label="Next">{page}</a></li>',
        'default_full_previous' => '<li class="page-item"><a href="{uri}" class="page-link" aria-label="Previous">{page}</a></li>',
        'pagination'   => 'App\Views\template\pagination',
    ];

    /**
     * --------------------------------------------------------------------------
     * Items Per Page
     * --------------------------------------------------------------------------
     *
     * The default number of results shown in a single page.
     */
    public int $perPage = 0;
}
