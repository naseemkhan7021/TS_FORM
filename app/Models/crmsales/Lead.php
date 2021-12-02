<?php

namespace App\Models\crmsales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $primaryKey = 'lead_id';
    protected $table = 'leads';
    protected $fillable = [
        'first_name' , 'middle_name' , 'last_name', 'mobile', 'full_name', 'email', 'required_sales_unit',
        'company_name', 'occupation' , 'designation', 'lead_feedback', 'current_leadstatus_id', 'current_source_id' ,
        'current_propertystatus_id' , 'lead_min_range' , 'lead_max_range' ,'residental_address'
     ];


    //  first_name , middle_name , last_name, mobile, full_name, email, required_sales_unit, company_name, occupation
    //  designation, lead_feedback, current_leadstatus_id, current_source_id
    //  current_propertystatus_id , lead_min_range , lead_max_range
    //  residental_address


}
