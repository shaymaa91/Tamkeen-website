@extends('layouts.main')
@section('title','All Employees')
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')



<div class="container pb-5">

	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Model Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{route('employees-model.create')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
											
					</div>
				</div>
			</div>
			<div class="container">
				<form class=" py-2 mb-2">
					<div class="row">
						<div class='col-4'>
							<input name='q' id='q' value='{{request()->q}}' autofocus type="text" class='form-control' placeholder="Enter your search ..." />
						</div>
						<div class='col-2'>
							<select name='city' id='city' class='form-control'>
								<option value=''>Any City</option>
								@foreach($cities as $city)
								<option {{request()->city==$city->id?'selected':''}} value='{{$city->id}}'>{{$city->name}}</option>
								@endforeach
							</select>
							
						</div>
						<div class='col-3 '>
							<select name='department' id='department' class='form-control'>
								<option value=''>Any Department</option>
								@foreach($departments as $department)
								<option {{request()->department==$department->id?'selected':''}} value='{{$department->id}}'>{{$department->department_name}}</option>
								@endforeach
							</select>
							
						</div>
					</div>
					<div class="row pt-3">
						<div class='col-2'>
							<select name='gender' id='gender' class='form-control'>
								<option value=''>Any Gender</option>
								<option {{ request()->gender=='M'?"selected":"" }} value='M'>Male</option>
								<option {{ request()->gender=='F'?"selected":"" }} value='F'>Female</option>
							</select>
						</div>
						<div class='col-2'>
							<select name='active' id='active' class='form-control'>
								<option value=''>Any Status</option>
								<option {{ request()->active=='1'?"selected":"" }} value='1'>Yes</option>
								<option {{ request()->active=='0'?"selected":"" }} value='0'>No</option>
							</select>
						</div>
						<div class='col-4'>
							<input type="submit" class='btn btn-primary mr-2' value='Search' />
							<input type="submit" class='btn btn-secondary' value='Clear Search' onclick="document.getElementById('q').value = null; document.getElementById('city').value = ''; document.getElementById('department').value = '';document.getElementById('active').value = ''; document.getElementById('gender').value = ''; return true;" />
						</div>
						
						
					</div>
					
					
				</form>
			</div>
			@if($employees->count()>0)
			<table class="table table-striped table-hover">
								
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th width="5%">EmpNo</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Gender</th> 
						<th>Department</th>
						<th>City</th>
						<th>Active?</th>
						<th>Image</th>
                        <th width="15%" class="text-center">Options</th>
					</tr>
				</thead>
				<tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->fname }}</td>
                        <td>{{ $employee->lname }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->email }}</td>                        
                        <td>{{ $employee->gender=='m'?"Male":"Female" }}</td>
						<td>{{ $employee->department->department_name??'' }}</td>
						<td>{{ $employee->city->name??'' }}</td>
						<td>{{ $employee->active==1?"Yes":"No" }}</td>
						<td>
							@if($employee->file =='')
									<span>No Image</span>
								@else
									<a href="{{ route("employees-model.download-image",$employee->file) }}">
										<img height='50' width='50' src={{asset("storage/image/{$employee->file}")}}>
									</a>
								@endif	
							
						</td>
						
							
						
						<td class="d-flex justify-content-center align-items-center">
                            <a href='{{ route("employees-model.show",$employee->id) }}' class='show'><i class="material-icons"  title="Edit">&#xe88e;</i></a>
                            <a href='{{ route("employees-model.edit",$employee->id) }}' class='edit' ><i class="material-icons"  title="Edit">&#xE254;</i></a>
							<!-- <a href="#deleteEmployeeModal" class="delete" data-id='{{$employee->id}}' data-toggle="modal"><i class="material-icons">&#xE872;</i></a> -->
							<a href='{{ route("employees-model.delete",$employee->id) }}' class='delete' onclick='return confirm("Are you sure?")'><i class="material-icons">&#xE872;</i></a>

						</td>
                        
                    </tr>


                @endforeach
				
				
				</tbody>
			</table>
			
		</div>
		<div class="pt-2">{{ $employees->links() }} </div>
		<div>
			<p>You are Showing <b>Page# {{ $employees->currentPage() }}</b>
			Of <b>{{ $employees->lastPage() }}</b> pages
			</p>
		</div> 
	</div>
	  
</div>

@else
<div class='alert alert-info alert-dismissible fade show '>
	<b>Sorry!</b> there is no results to your search
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
@endsection


