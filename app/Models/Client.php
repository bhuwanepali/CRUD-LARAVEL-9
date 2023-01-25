<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'gender',
        'phone',
        'email',
        'nationality',
        'dob',
        'education',
        'mode_of_contact'
    ];

}
