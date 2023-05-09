<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable,HasRoles;
    // use SoftDeletes;
    protected $dates = ['deleted_at'];        
    protected $fillable = [
        'full_name',
        'profile_pic',
        'Address_Location',
        'phone_no',
        'password',
        'email_verified_at',
        'email',
        'access_token',
        'avatar ',
        'provider',
        'provider_id',
        'status',
    ];
    public function profileInformation(){
        return $this->hasOne(profileInformation::class,'user_id','id');
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
