

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{asset('css/crudwithoutres.css')}}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="savecrud" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>		
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($data as $member)
					<tr>
						<td>{{ $member['id']}}</td>
        				<td>{{ $member['name']}}</td>
        				<td>{{ $member['address']}}</td>
        				<td>{{ $member['email']}}</td>
						<td>
							<a href={{"editcrud/".$member['id']}} class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
							<a href={{"deletecrud/".$member['id']}} class="delete"><i class="material-icons"title="Delete">&#xE872;</i></a>
						</td>
					</tr> 
                    @endforeach
				</tbody>
			</table>
        </div>
    </div>
	</div>        
</div>  
<div class="col-12 pagination" >
    <div class="col-space">
        {{$data->links()}}
    </div>
</div>
</div> 