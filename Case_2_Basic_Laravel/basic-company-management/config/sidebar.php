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
            'url' => '/dashboard',
            'caret' => false
        ],
        [
            'icon' => 'fa fa-home',
            'title' => 'Companies',
            'url' => '/company',
            'caret' => false,
            'role' => 'super_admin'
        ],
        [
            'icon' => 'fa fa-users',
            'title' => 'Employees',
            'url' => '/employee',
            'caret' => false,
        ],
    ],
];
