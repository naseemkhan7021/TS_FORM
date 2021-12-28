<?php

namespace App\Models\forms_66;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationRequirements extends Model
{
    use HasFactory;
    protected $primaryKey = 'organization_requirement_id';
    protected $fillable = [
        'organization_requirement_description',
        'organization_requirement_abbr',
        'organization_requirement_detail',
        'organization_requirement_value',
    ];


    public function sub_activity()
    {
        return $this->belongsTo(SubActivity66::class,'organization_requirement_id_fk','organization_requirement_id');
    }
}
