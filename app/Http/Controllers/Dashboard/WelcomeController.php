<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class WelcomeController extends Controller
{

    public function index()
    {
        return view('dashboard.welcome');
    }//end of index

}//end of controller
