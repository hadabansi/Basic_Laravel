
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
		</table>
</div> 
<script>
 $(function () {
    var table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'address', name: 'address', orderable: true, searchable: true},
        ]
    });
    
  });
</script>