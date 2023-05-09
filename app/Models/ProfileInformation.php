<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileInformation extends Model
{
  protected $table = 'profile_informations';
  protected $fillable = ['dob','gender','user_id','about_us','photo','emergency_number','id_proof'];
}
