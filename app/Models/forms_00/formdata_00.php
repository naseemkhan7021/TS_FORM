<?php

namespace App\Models\forms_00;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata_00 extends Model
{
    use HasFactory;

    protected $primaryKey = 'formdata_00s_id';
    protected $table = 'formdata_00s';
    protected $fillable = [
        'ibc_id_fk', 'idepartment_id_fk','iproject_id_fk','document_id_fk','sr_no' , 'document_name' , 'document_code','counter'
    ];

}










