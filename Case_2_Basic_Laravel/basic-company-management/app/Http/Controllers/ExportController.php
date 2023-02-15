<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function companies(){
        $data = Company::select('name', 'email', 'website')->get()->toArray();
        $pdf = Pdf::loadView('vendor.datatables.print', ['data' => $data]);
        return $pdf->download('companies.pdf');
    }
}
