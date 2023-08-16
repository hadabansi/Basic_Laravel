<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usermodel;

class usercontroller extends Controller
{
    function fetchdata()
    {
    $data=usermodel::paginate(5);
    // dd($data);
    return view("fetchdata",compact("data"));
    }
}
