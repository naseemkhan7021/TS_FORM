<?php

namespace App\Models\common_forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = 'idepartment_id';
    protected $table = 'departments';
    protected $fillable = [
        'sdepartment_name','sdepartment_abbr', 'ibc_id_fk'
    ];
}
