<?php

namespace App\Models\common_forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dept_Default_Docs extends Model
{
    use HasFactory;

    protected $primaryKey = 'ddd_id';
    protected $table = 'dept_default_docs';
    protected $fillable = [
        'document_name','document_code'
    ];

}
