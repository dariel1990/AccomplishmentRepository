<?php

namespace App\Models;

use App\Models\MajorFinalOutput;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;

    protected $fillable = ['office_code', 'office_name', 'office_short_name', 'office_address', 'office_head', 'office_short_address', 'position_name'];

    public function majorFinal()
    {
        return $this->hasMany(MajorFinalOutput::class, 'office_code', 'office_code');
    }
}
