<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeesDataTable;
use App\Helpers\ResponseHelper;
use App\Http\Requests\EmployeeForm;
use App\Models\Company;
use App\Models\Employee;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index(EmployeesDataTable $datatable)
    {
        return $datatable->render('pages.employee.index');
    }

    public function create()
    {
        $companies = Company::pluck('name', 'id');
        return view('pages.employee.add-edit', ['companies' => $companies]);
    }

    public function store(EmployeeForm $request)
    {
        return DB::transaction(function () use ($request) {
            $msg = "Data Tersimpan";
            try {
                $data = Employee::createFromRequest($request);

            } catch (QueryException $th) {
                DB::rollBack();
                $msg = Arr::last($th->errorInfo);
                toast($msg, 'error');
                return ResponseHelper::json(500, $msg);
            }

            toast($msg, 'success');
            return ResponseHelper::json(200, $msg);
        });
    }

    public function edit($id)
    {
        $data = Employee::findOrFail($id);
        $companies = Company::pluck('name', 'id');
        return view('pages.employee.add-edit', ['data' => $data,'companies' => $companies]);
    }

    public function update(Request $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            $msg = 'Data berhasil diubah';

            try {
                $employee = Employee::findOrFail($id);
                $employee->mapFromRequest($request);
                $employee->save();
            } catch (QueryException $th) {
                $msg = Arr::last($th->errorInfo);
                toast($msg, 'error');
                return ResponseHelper::json(500, $msg);
            }

            toast($msg, 'success');
            return ResponseHelper::json(200, $msg);
        });
    }

    public function destroy($id)
    {
        $msg = 'Data berhasil dihapus';

        try {
            $company = Employee::findOrFail($id);
            $company->delete();
        } catch (QueryException $th) {
            $msg = Arr::last($th->errorInfo);
            toast($msg, 'error');
            return ResponseHelper::json(500, $msg);
        }

        toast($msg, 'success');
        return ResponseHelper::json(200, $msg);
    }
}
