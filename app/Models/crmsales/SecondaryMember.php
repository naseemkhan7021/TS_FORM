<?php

namespace App\Models\crmsales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryMember extends Model
{
    use HasFactory;

    protected $primaryKey = 'iSecondary_MemberID';
    protected $table = 'secondary_members';
    protected $fillable = [
        'sSecondary_FirstName' , 'sSecondary_MiddleName' , 'sSecondary_LastName', 'sSecondary_FullName', 'iMemberID_FK', 'email', 'sOccupation_sc',
        'sPanCard_sc', 'sPanCard_Photo_sc' , 'sAadhaarCard_sc', 'sAadhaarCard_Photo_sc', 'iNationalityID_FK', 'iGenderID_FK' ,
        'iPurchased_UnitID_FK' , 'iRelationTypeID_FK' , 'sMobileNo1_sc' ,'sMobileNo2_sc',
        'sEmailID1_sc' , 'sEmailID2_sc', 'sResidentialAddress1_sc','sResidentialAddress2_sc','sPinCode_sc','sCity_sc','dtDOBK', 'dtDOB_sc'
     ];

}
