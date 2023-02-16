<?php

namespace App\Http\Controllers;

use App\DataTables\DashboardDataTable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(DashboardDataTable $datatable)
    {
        return $datatable->render('dashboard');
    }
}
