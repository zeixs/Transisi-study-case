<?php

namespace App\Constants;

class RequestRuleConstant
{

    public static function companyColumns(){
        return collect([
            'company_name' => 'required',
            'company_email' => 'required',
            'company_logo' => 'sometimes|required',
            'company_website' => 'required',
        ]);
    }
    public static function employeeColumns(){
        return collect([
            'employee_name' => 'required',
            'employee_email' => 'required',
            'employee_company_id' => 'required',
        ]);
    }
}
