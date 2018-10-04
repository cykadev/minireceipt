<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    public function ancestors()
    {
    	return $this->hasMany('App\models\NavAncestor', 'navbar_id');
    }
}
