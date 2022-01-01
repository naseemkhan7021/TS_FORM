<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'role⁯_id';
    protected $table = 'roles';
    protected $fillable = [
        'role_title', 'role_abbr',
    ];



    // public function user()
    // {
    //     return $this->belongsTo(User::class,'current_role⁯_id','role⁯_id');
    // }

}
