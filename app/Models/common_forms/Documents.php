<?php

namespace App\Models\common_forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $primeryKey = 'document_id';
    protected $table = 'documents';
    protected $fillable = [
        'document_description','issue_no','issue_dt','revision_no','revision_date'
    ];
}
