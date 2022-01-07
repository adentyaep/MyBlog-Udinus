<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;
    protected $table = 'about_me';
    
    protected $fillable = [
        'name',
        'short_description',
        'photo',
        'content'
    ];

    public static $rules = [
        'name'       => 'required',
        'short_description'    => 'required',
        'photo' => 'required',
        'content'     => 'required'
    ];
}