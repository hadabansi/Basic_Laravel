<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usermodel;

class usercontroller extends Controller
{
    function fetchdata()
    {
    $data=usermodel::all();
  
    }
}
