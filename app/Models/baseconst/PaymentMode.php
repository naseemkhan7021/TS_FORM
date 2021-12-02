<?php

namespace App\Models\baseconst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMode extends Model
{
    use HasFactory;

    protected $primaryKey = 'paymentmode_id';
    protected $table = 'payment_modes';
    protected $fillable = [
        'paymentmode_description','paymentmode_abbr'
     ];

}
