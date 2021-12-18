<?php

namespace App\Models\forms_22;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata_22_participant extends Model
{
    use HasFactory;

    protected $primaryKey = 'formdata_22_participants_id';
    protected $table = 'formdata_22_participants';
    protected $fillable = [
        'formdata_22s_id_fk', 'id_no' , 'participant_name' , 'age' , 'desgination' , 'signature'
    ];

}
