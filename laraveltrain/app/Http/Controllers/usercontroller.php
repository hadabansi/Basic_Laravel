<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Carbon\Carbon;
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
        $currentDate = Carbon::now();
        $users = User::query();
        if ($request->ajax()) {
            $users = User::query();
            return Datatables::of($users)
            ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-warning" }}')
            ->addColumn('action', function($row){
     
                $btn = ' <button class="btn-success"><a href="'.route('users.edit', $row->id).'">Edit</a></button>';

                 return $btn;
         })
         ->rawColumns(['action'])
            ->addColumn('created_at', function ($user) {
                return $user->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('updated_at', function ($user) {
                return $user->updated_at->format('d-m-Y');
            })
            ->toJson();
        }
        
        return view('yajradata');
       
    }

    function edityajradata(Request $req,$id)
    {
        $data=User::find($id);
        return view('yajraedit',['data'=>$data]);
    }
    function updateyajradata(Request $req,$id)
    {
      $data=User::find($id);
      $data->name=$req->name;
      $data->email=$req->email;
      $data->save();
      return redirect()->route('users');
    }
}
