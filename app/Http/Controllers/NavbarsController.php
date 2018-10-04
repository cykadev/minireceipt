<?php

namespace App\Http\Controllers;

use App\models\Navbar;
use Illuminate\Http\Request;

class NavbarsController extends Controller
{
    public function index()
    {
    	$navbars = Navbar::with('ancestors')->get();
		return response()->json($navbars);
    }
}
