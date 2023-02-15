<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $company_id = Company::where('name', 'LIKE',  '%' . $row['company_name']. '%')
                ->where('email', 'LIKE',  '%' . $row['company_email']. '%')
                ->first()->id;
        $data = new Employee();
        $data->name = $row['name'];
        $data->email = $row['email'];
        $data->company_id = $company_id;
        $data->save();
    }
}
