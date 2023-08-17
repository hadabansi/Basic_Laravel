<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Carbon\Carbon;
use App\Mail\datamail;
use Illuminate\Support\Facades\Mail;
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
                $btn2=' <button class="btn-success"><a href="'.route('users.delete', $row->id).'">Delete</a></button>';
                $btn3=' <button class="btn-success"><a href="'.route('users.mail', $row->id).'">Send Mail</a></button>';
                 return $btn.$btn2.$btn3;
         })
         ->rawColumns(['action'])
            ->addColumn('created_at', function ($user) {
                return $user->created_at->format('Y-m-d');
            })
            ->addColumn('updated_at', function ($user) {
                return $user->updated_at->format('d-m-Y H:i:s');
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
    function deleteyajradata(Request $req,$id)
  {  
      $data=User::find($id);
      $data->delete();
      return redirect()->route('users');
  }

  function mailyajradata($id){
    $email = User::where('id', $id)->first();

    if (!$email) {
        return 'Email not found.';
    }

    Mail::to($email->email)->send(new datamail($email));

    return 'Email sent successfully!';
  }
}
