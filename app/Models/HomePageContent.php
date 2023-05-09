<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageContent extends Model
{
    use HasFactory;
    protected $fillable = ['middle_section_image_right','middle_section_right_text','middle_section_right_heading_text','middle_section_right_sub_heading_text',' middle_section_image_left','middle_section_left_text','middle_section_left_heading_text','middle_section_left_sub_heading_text'];

}
