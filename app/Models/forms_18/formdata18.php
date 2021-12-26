<?php

namespace App\Models\forms_18;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata18 extends Model
{
    use HasFactory;

    protected $primaryKey = 'formdata_18s_id';
    protected $table = 'formdata_18s';
    protected $fillable = [
        'iproject_id_fk',
        'extinguisher_no',
        'location',
        'type',
        'size',
        'date_of_refilling ',
        'date_of_inspection',
        'pressure_gauge_or_safety_pin_status',
        'seal_intact_and_not_corroded',
        'name_of_responsible_person',
        'due_for_next_refilling ',
        'due_for_next_inspection',
        'inspected_by_name',
        'inspected_by_signature',
        'inspected_by_designation',
        'inspected_by_date',
    ];
}
