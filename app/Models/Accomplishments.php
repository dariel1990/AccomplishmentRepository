<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accomplishments extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 
        'control_no', 
        'office', 
        'request_date',
        'date_acted',
        'date_completed',
        'problem',
        'solution',
        'requested_by',
        'approved_by',
        'category',
    ];      

    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
