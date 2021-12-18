<?php

namespace App\Models\forms_22;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topic_discussed extends Model
{
    use HasFactory;

    protected $primaryKey = 'topic_discusseds_id';
    protected $table = 'topic_discusseds';
    protected $fillable = [
        'topic_discusseds_description', 'topic_discusseds_abbr'
    ];

}
