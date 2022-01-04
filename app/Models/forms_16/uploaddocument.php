<?php

namespace App\Models\forms_16;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uploaddocument extends Model
{
    use HasFactory;

    protected $primaryKey = 'uploaddocuments_id'; 
    protected $table = 'uploaddocuments';
    protected $fillable = [
        'uploaddocuments_name',
        'uploaddocuments_title',
        'uploaddocuments_location',
        'forms16_id',
        'forms17_id'
    ];

    protected $casts = [
        'uploaddocuments_name' => 'array',
        'uploaddocuments_title' => 'array',
        'uploaddocuments_location' => 'array',
    ];
}
