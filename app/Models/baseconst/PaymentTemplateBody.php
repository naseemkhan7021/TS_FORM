<?php

namespace App\Models\baseconst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTemplateBody extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'payment_template_bodies';
    protected $fillable = [
        'templatehead_ID_FK','iLineID' , 'sID' , 'sDescription' , 'iPercentage' , 'mAmount'
     ];

}







