
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

 
			<table id="myTable">
				<thead>
					<tr>
                        <th>Id</th>
						<th>Name</th>
						<th>Address</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($data as $member)
					<tr>
						<td>{{ $member['id']}}</td>
        				<td>{{ $member['name']}}</td>
        				<td>{{ $member['address']}}</td>
        				<td>{{ $member['email']}}</td>
					
					</tr> 
                    @endforeach
				</tbody>
			</table>
</div> 
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>