<?php

namespace App\Models\forms_35;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form35_labels extends Model
{
    use HasFactory;

    protected $primaryKey = 'form35_labels_id';
    protected $table = 'form35_labels';
    protected $fillable = [
        'form35_labels_desc',
        'form35_labels_abbr'
    ];

}
