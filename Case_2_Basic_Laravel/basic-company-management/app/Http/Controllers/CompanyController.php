<?php

namespace App\Http\Controllers;

use App\DataTables\CompaniesDataTable;
use App\DataTables\testDataTable;
use App\Helpers\ResponseHelper;
use App\Http\Requests\CompanyForm;
use App\Models\Company;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index(CompaniesDataTable $datatable)
    {
        return $datatable->render('pages.company.index');
    }

    public function create()
    {
        return view('pages.company.add-edit');
    }

    public function store(CompanyForm $request)
    {
        return DB::transaction(function () use ($request) {
            $msg = "Data Tersimpan";
            try {
                $data = Company::createFromRequest($request);

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
        $data = Company::findOrFail($id);
        return view('pages.company.add-edit', ['data' => $data]);
    }

    public function update(Request $request, Company $company)
    {
        return DB::transaction(function () use ($request, $company) {
            $msg = 'Data berhasil diubah';

            try {
                $company->mapFromRequest($request);
                $company->save();
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
            $company = Company::findOrFail($id);
            $company->delete();
        } catch (QueryException $th) {
            $msg = Arr::last($th->errorInfo);
            toast($msg, 'error');
            return ResponseHelper::json(500, $msg);
        }

        toast($msg, 'success');
        return ResponseHelper::json(200, $msg);
    }

    public function getCompanies(Request $request){
        
        if ($request->ajax()) {

            $term = trim($request->term);
            $posts = DB::table('companies')->select('id','name as text')
                ->where('name', 'LIKE',  '%' . $term. '%')
                ->orderBy('name', 'asc')->simplePaginate(10);
           
            $morePages=true;
           $pagination_obj= json_encode($posts);
           if (empty($posts->nextPageUrl())){
            $morePages=false;
           }
            $results = array(
              "results" => $posts->items(),
              "pagination" => array(
                "more" => $morePages
              )
            );
        
            return response()->json($results);
        }
    }
}
