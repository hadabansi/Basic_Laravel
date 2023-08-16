
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <h1> Edit data</h1>
            @if ($data)
            <form action={{route("users.update",$data->id)}} method="POST">
              @csrf 
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $data['name'] ?? '' }}"> 
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $data['email'] ?? '' }}"> 
                  </div>
                <button type="submit" class="btn btn-primary">Update User</button>
              </form>
            @else
              <p>Data is not available.</p>
            @endif