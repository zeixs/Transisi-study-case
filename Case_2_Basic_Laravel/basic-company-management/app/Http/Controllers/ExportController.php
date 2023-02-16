<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function companies(){
        $data = Company::select('name', 'email', 'website')->get()->toArray();
        $pdf = Pdf::loadView('vendor.datatables.print', ['data' => $data]);
        return $pdf->download('companies.pdf');
    }

    public function employees(){
        $data = Employee::leftJoin('companies', 'companies.id', 'employees.company_id')
            ->select('employees.name', 'employees.email', 'companies.name as company_name')
            ->get()
            ->toArray();
        $pdf = Pdf::loadView('vendor.datatables.print', ['data' => $data]);
        return $pdf->download('employees.pdf');
    }
}
