<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usermodel;
use DataTables;

class usercontroller extends Controller
{
    function fetchdata()
    {
    $data=usermodel::all()->toarray();
    // dd($data);
    return view("fetchdata",compact("data"));
    }

    function fetchyajradata(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(usermodel::query())
            ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-warning" }}')
            ->make(true);
        }
        
        return view('yajradata');
       
    }
}
