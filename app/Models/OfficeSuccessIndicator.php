<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfficeSuccessIndicator extends Model
{
    use HasFactory;

    protected $fillable = ['mfo_id', 'particular', 'seq_no'];


    public function majorFinal()
    {
        return $this->belongsTo(MajorFinalOutput::class, 'mfo_id', 'mfo_id');
    }

    
}
