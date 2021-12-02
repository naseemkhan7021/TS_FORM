<?php

namespace App\Models\baseconst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelPartner extends Model
{
    use HasFactory;

    protected $primaryKey = 'channelpartner_id';
    protected $table = 'channel_partners';
    protected $fillable = [
        'cp_first_name','cp_middle_name' , 'cp_last_name' , 'cp_mobile' , 'cp_email' , 'cp_company_name'
     ];

}




