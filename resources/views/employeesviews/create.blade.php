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
<div class="container p-5 mt-5 ">
    <div class="px-5">
        <form  method='post' action='{{route("employees-model.index")}}' class="mx-5 px-5">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="fname">First Name</label>
                    <input autofocus='true' value='{{ old("fname") }}' type="text" class="form-control" name="fname" id="fname" placeholder="Employee First Name">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="lname">Last Name</label>
                    <input value='{{ old("lname") }}' type="text" class="form-control" name="lname" id="lname" placeholder="Employee Last Name">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="email">Email</label>
                    <input type="text" value='{{ old("email") }}' class="form-control" name="email" id="email" placeholder="Enter Email Address">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" value='{{ old("phone") }}' class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 mb-3">          
                    <label>
                    <input {{old('gender')=='m'?"checked":""}} type="radio" value='m' name="gender" />
                    Male
                    </label>
                    <label>
                    <input {{old('gender')=='f'?"checked":""}} type="radio" value='f' name="gender" />
                    Female
                    </label>
                </div>
            </div>
            
            <button class="btn btn-primary" type="submit">Create</button>
            <a class='btn btn-light' href='{{route("employees-model.index")}}'>Cancel</a>

        </form>
        
    </div>
    
</div>

@endsection


