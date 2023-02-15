<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */
    'menu' => [
        [
            'icon' => 'fa fa-th-large',
            'title' => 'Dashboard',
            'url' => '/home',
            'caret' => false
        ],
        [
            'icon' => 'fa fa-home',
            'title' => 'Companies',
            'url' => '/companies',
            'caret' => false,
            'role' => 'super_admin'
        ],
        [
            'icon' => 'fa fa-users',
            'title' => 'Employees',
            'url' => '/employees',
            'caret' => false,
        ],
    ],
];
