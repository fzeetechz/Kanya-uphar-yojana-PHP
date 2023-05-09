<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Registration extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'amount',
        'email',
        'mobile',
        'registration_number',
        'document',
        'user_id',
        'status',
        'father_name',
        'address',
        'mother_name',
        'plan_id'
    ];
    
    public function registerBy(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function plan(){
        return $this->belongsTo(Plan::class);
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y h:i A');
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y h:i A');
    }
}
