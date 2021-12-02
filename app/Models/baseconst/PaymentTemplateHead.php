<?php

namespace App\Models\baseconst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTemplateHead extends Model
{
    use HasFactory;

    protected $primaryKey = 'templatehead_ID';
    protected $table = 'payment_template_heads';
    protected $fillable = [
        'stemplatedescription','sdetails' , 'mPercentage' , 'mAmount' , 'iRows'
     ];

}
