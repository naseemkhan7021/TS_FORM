<?php

namespace App\Models\forms_35;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata_35 extends Model
{
    use HasFactory;

    protected $primaryKey = 'formdata_22s_id';
    protected $table = 'formdata_22_headers';
    protected $fillable = [
        'ibc_id_fk',
        'idepartment_id_fk',
        'iproject_id_fk', 
        'document_id_fk',
        'parmitNo',
        'working_dt',
        'working_t_F',
        'working_t_T',
        'contractor_name',
        'supervisor_name',
        'no_of_people_working',
        'form35_checkpoint_ids',
        'activity_ids',
        'form35_checkpoint_remark',
        'exact_location_nature_of_work_ids',
        'name_of_permit_issuing_authority',
        'sing_of_permit_issuing_authority',
        'name_permit_receiver',
        'sing_permit_receiver',
        'name_safety_representative',
        'sing_safety_representative',
        'name_of_permit_issuing_receiver_if_complete',
        'sing_of_permit_issuing_receiver_if_complete',
        'permit_issuing_receiver_if_complete_sing_dt',
        'name_of_permit_issuing_authority_if_complete',
        'sing_of_permit_issuing_authority_if_complete',
        'permit_issuing_authority_if_complete_sing_dt',
        'name_of_site_safety_officer',
        'sing_of_site_safety_officer',
        'permit_close_or_continued',
        'tags_removed',
    ];

}
