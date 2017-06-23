<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'name','code','office','position','related_project','salary','grade','sex','religion','address','company_mobile','personal_mobile','home_phone','emergency_contact','emergency_relativity','emergency_phone','join_date','vacation_type','contract_date','qualification','qualification_year','army_status','id_number','id_type','id_end_date','marital_status','number_of_children','birth_date','email','health_insurance_number','bank_account','insurance_join_date','insurance_number','const_insurance_salary','var_insurance_salary','total_insurance_salary','company_percentage_const','employee_percentage_const','company_percentage_var','employee_percentage_var','total_company_compensation','total_employee_compensation','resign_date','termination','waiting_list','form_6_date','form_6_number','form_111','gov_health_number','insurance_notes','birth_certificate','army_certificate','qualification_copy','id_copy','personal_photo','criminal_record','employment_decision','insurance_stamp'
    ];


    public function user () {

        return $this->hasOne('App\Models\User' , 'code' , 'code');

    }

    public function vacationRequest () {

        return $this->hasMany('App\Models\VacationRequest' , 'employee_code' , 'code');

    }

    public function vacation () {

        return $this->hasOne('App\Models\Vacation' , 'employee_code' , 'code');

    }

    public function lastVacationRequest () {

        return $this->vacationRequest->last();

    }

    public function getIsResignedAttribute ()
    {

        $resign_date = Carbon::parse($this->resign_date);
        $current_date = Carbon::now();

        if ($current_date->month > $resign_date->month ||
            $current_date->year > $resign_date->year)
            return true;
        else
            return false;

    }

}
