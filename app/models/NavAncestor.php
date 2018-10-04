<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class NavAncestor extends Model
{
    public function nav()
    {
    	return $this->belongsTo('App\models\Navbar', 'id');
    }
}
