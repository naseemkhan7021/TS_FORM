<?php

namespace App\Models\crmsales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryMember extends Model
{
    use HasFactory;

    protected $primaryKey = 'iMemberID';
    protected $table = 'primary_members';
    protected $fillable = [
        'sMember_FirstName' , 'sMember_MiddleName' , 'sMember_LastName', 'sMember_FullName', 'sOccupation', 'sPanCard', 'sPanCard_Photo',
        'sAadhaarCard', 'sAadhaarCard_Photo' , 'iNationalityID_FK', 'iGenderID_FK', 'iPurchased_UnitID_FK', 'sMobileNo1' ,
        'sMobileNo2' , 'sEmailID1' , 'sEmailID2' ,'sResidentialAddress1' , 'sResidentialAddress2' , 'sPinCode' ,
        'sCity' , 'dtDOBK', 'dtDOB'
     ];

}
