<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
// use Carbon\Carbon;
use App\Mail\datamail;
use App\Mail\datadeletemail;
use Illuminate\Support\Facades\Mail;
use Validator;
class usercontroller extends Controller
{
    function fetchdata()
    {
    $data=User::all()->toarray();
    // dd($data);
    return view("fetchdata",compact("data"));
    }

    function fetchyajradata(Request $request)
    {
        // $currentDate = Carbon::now();
        $users = User::query();
        if ($request->ajax()) {
            $users = User::query();
            return Datatables::of($users)
            ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-danger" }}')
            ->addColumn('action', function($row){
     
                $btn ='<a href="'.route('users.edit', $row->id).'" class="btn btn-success"><span>Edit</span></a>  ';
                $btn2='<a href="'.route('users.delete', $row->id).'" class="btn btn-danger">Delete</a>  ';
                $btn3=' <a href="'.route('users.mail', $row->id).'" class="btn btn-primary">Send Mail</a>';
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
      // $data=User::find($id);
     
      $email = User::where('id', $id)->first();

      if (!$email) {
          return 'Email not found.';
      }
      Mail::to($email->email)->send(new datadeletemail($email));
      $req->session()->flash('email_sent', 'Kindly Confirm Mail For Delete Data');
      //$email->delete();
      return redirect()->route('users');
  }

  function confirmdelete(Request $req,$id)
  {
    $data=User::find($id);
    $data->delete();
    $req->session()->flash('email_confirm', 'Data Deleted Successfully.');
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

  
  function createyajradata(Request $req)
  {
    $rules=array(
      "name"=>"required",
      "email"=>"required",
      "password"=>"required"
  );
      $validator=Validator::make($req->all(),$rules);
      if($validator->fails())
      {
         return view('yajracreate')
         ->withInput($req->input())
         ->withErrors($validator);
      }
      else{
    $data=new User;
    $data->name=$req->name;
    $data->email=$req->email;
    $data->password=$req->password;
    $data->save();
    return redirect()->route('users');
  }
  }

}
