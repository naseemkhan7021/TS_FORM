<?php

namespace App\Models\common_forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defaultdata extends Model
{
    use HasFactory;

    protected $primaryKey = 'idefault_id';
    protected $table = 'defaultdatas';
    protected $fillable = [
        'description', 'ibc_id_fk','idepartment_id_fk','iproject_id_fk'
    ];
}
