<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = [
        'title',         'price',        'applicable',        'category', 		'admission'
        ];
}
