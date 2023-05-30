<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VictimDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'job',
        'city',
        'color',
        'sport',
        'hobby'
    ];
}
