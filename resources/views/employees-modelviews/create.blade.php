@extends('layouts.main')
@section('title','All Employees')
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



@endsection
@section('content')
<h2 class="text-center py-5 ">Add New Employee</h2>
<div class="container mt-2">

    <form  enctype="multipart/form-data"   method='post' action='{{route("employees-model.index")}}' >
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fname">First Name</label>
                <input autofocus='true' value='{{ old("fname") }}' type="text" class="form-control" name="fname" id="fname" placeholder="First Name">
                
            </div>
            <div class="col-md-6 mb-3">
                <label for="lname">Last Name</label>
                <input value='{{ old("lname") }}' type="text" class="form-control" name="lname" id="lname" placeholder="Last Name">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="text" value='{{ old("email") }}' class="form-control" name="email" id="email" placeholder="Email Address">
                
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone">Phone</label>
                <input type="text" value='{{ old("phone") }}' class="form-control" name="phone" id="phone" placeholder="Phone Number">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="department_id">department</label>
                <select class='form-control' name='department_id' id='department_id'>
                    <option value=''>-Select- </option>
                    @foreach($departments as $department)
                    <option {{old('department_id')==$department->id?'selected':''}} value='{{$department->id}}'>{{$department->department_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="city_id">City</label>
                <select class='form-control' name='city_id' id='city_id'>
                    <option value=''>-Select-</option>
                    @foreach($cities as $city)
                    <option {{old('city_id')==$city->id?'selected':''}} value='{{$city->id}}'>{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-6 mb-3 py-3">  
                <div class="custom-file">
                    <label for="name">Your Image</label>
                    <input type="file" class="form-control" name="file" id="file" >
                </div>
            </div>                    
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">          
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
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>
                <!--input type='hidden' value='0' name='active' /-->
                <input value='1' {{old('active')?"checked":""}} type="checkbox" name="active" />
                Active
                </label>
            </div>  
        </div>
        <button class="btn btn-primary" type="submit">Create</button>
        <a class='btn btn-light' href='{{route("employees-model.index")}}'>Cancel</a>

    </form>
</div>

@endsection


