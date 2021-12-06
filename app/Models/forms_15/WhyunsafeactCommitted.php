<?php

namespace App\Models\forms_15;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyunsafeactCommitted extends Model
{
    use HasFactory;

    protected $primaryKey = 'whyunsafeact_committeds_id';
    protected $table = 'whyunsafeact_committeds';
    protected $fillable = [
        'whyunsafeact_committeds_description', 'whyunsafeact_committeds_abbr'
    ];

}
