<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif
      <h1> Add User</h1>
            <form method="POST" action="{{route("users.create")}}">
              @csrf
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" value="{{old('name')}}"> 
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email"> 
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                 
                <button type="submit" class="btn btn-primary">Add User</button>
              
              </form>
