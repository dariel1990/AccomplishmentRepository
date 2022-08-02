<?php

namespace App\Models;

use App\Models\Office;
use App\Models\OfficeSuccessIndicator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MajorFinalOutput extends Model
{
    use HasFactory;
    

    protected $fillable = ['office_code', 'category', 'mfo_desc', 'seq_no'];


    public function office()
    {
        return $this->belongsTo(Office::class, 'office_code', 'office_code');
    }


    public function officeSuccessIndicator()
    {
        return $this->hasMany(OfficeSuccessIndicator::class, 'mfo_id', 'mfo_id');
    }
}
