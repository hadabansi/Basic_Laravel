
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<h1></h1>

<h5 class="text-danger"></h5>

{{-- <a href="{{route('users.cancel')}}" class="btn btn-danger">Cancel</a><br> --}}

<div class="container">
<div class="card">
    <h5 class="card-header">Hii ,{{$maildata->name}}</h5>
    <div class="card-body">
      <h5 class="card-title text-danger">Are you Sure you want to delete your crendetial??</h5>
      <a href="{{route('users.confirmdelete', $maildata->id)}}" class="btn btn-primary">Confirm</a><br>
    </div>
  </div>
</div>