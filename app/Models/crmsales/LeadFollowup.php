<?php

namespace App\Models\crmsales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadFollowup extends Model
{
    use HasFactory;

    protected $primaryKey = 'iFollowUpID';
    protected $table = 'lead_followups';
    protected $fillable = [
        'lead_id_FK' , 'lead_oldstatus_FK' , 'lead_newstatus_FK' , 'current_dt' ,  'nextfollowup_dt' ,  'staff_id' , 'bactive2' ,
        'staffhead_id' , 'management_id' , 'staff_description' , 'staffhead_description' , 'management_description' , 'modeofconversation_id_fk'
     ];

}
