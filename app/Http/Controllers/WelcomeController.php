<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
    	session_start();
    	    	// dd($_SESSION['user']);

    	if (isset($_SESSION['user'])) {
 	    	return view('welcome');
    		
    	}else {
    		return redirect('/login');
    	}
    
    }
}
