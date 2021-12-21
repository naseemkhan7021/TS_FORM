<?php

namespace App\Models\common_forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $primaryKey = 'iproject_id';
    protected $table = 'projects';
    protected $fillable = [
        'sproject_name','sproject_abbr','sproject_location','idepartment_id_fk','ibc_id_fk'
    ];
}
