<?php

namespace App\Http\Controllers;

use App\Helpers\FileUploaderHelper;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ImportForm;
use App\Imports\CompanyImport;
use App\Imports\EmployeeImport;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function company(ImportForm $request){
        
        Excel::import(new CompanyImport, $request->file);

        return back()->with('status', 'success');
    }

    public function employee(ImportForm $request){
        
        Excel::import(new EmployeeImport, $request->file);

        return back()->with('status', 'success');
    }
}
