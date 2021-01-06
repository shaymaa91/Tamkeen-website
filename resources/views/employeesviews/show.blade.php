@extends('layouts.main')
@section('title','All Employees')
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')
<h2 class="text-center m-5 pt-5">Add New Employee</h2>
<div class="container pt-5 mt-5 ">
    <form>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fname">First Name</label>
                <input readonly autofocus='true' value='{{ $employee->fname }}' type="text" class="form-control" name="fname" id="fname" placeholder="First Name">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="lname">last Name</label>
                <input readonly autofocus='true' value='{{ $employee->lname }}' type="text" class="form-control" name="lname" id="lname" placeholder="Last Name">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input readonly type="text" value='{{ $employee->email }}' class="form-control" name="email" id="email" placeholder="Enter Email Address">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="phone">Phone</label>
                <input readonly type="text" value='{{ $employee->phone }}' class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">          
                <label>
                <input disabled {{$employee->gender=='m'?"checked":""}} type="radio" value='m' name="gender" />
                Male
                </label>
                <label>
                <input disabled {{$employee->gender=='f'?"checked":""}} type="radio" value='f' name="gender" />
                Female
                </label>
            </div>
        </div>
        
        <a href='{{ route("employees.edit",$employee->id) }}' class='btn btn-sm btn-info'>Edit</a>
        <a class='btn btn-light' href='{{route("employees.index")}}'>Cancel</a>

    </form>

</div>

@endsection
