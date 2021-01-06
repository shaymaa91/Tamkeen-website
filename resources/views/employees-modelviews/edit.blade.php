@extends('layouts.main')
@section('title','All Employees')
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')
<h2 class="text-center m-5 pt-5">Edit Employee</h2>
<div class="container pt-5 mt-5 ">
    
<form enctype="multipart/form-data"  method='post' action='{{asset("employees-model/".$employee->id)}}'>

    @csrf
    @method("put")
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="fname">First Name</label>
            <input autofocus='true' value='{{ old("fname",$employee->fname) }}' type="text" class="form-control" name="fname" id="fname">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="lname">Last Name</label>
            <input autofocus='true' value='{{ old("lname",$employee->lname) }}' type="text" class="form-control" name="lname" id="lname" >
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <input type="text" value='{{ old("email",$employee->email) }}' class="form-control" name="email" id="email" placeholder="Enter Email Address">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone">Employee Phone</label>
            <input type="text" value='{{ old("phone",$employee->phone) }}' class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="department_id">Department</label>
            <select class='form-control' name='department_id' id='department_id'>
                <option value=''>-Select-</option>
                @foreach($departments as $department)
                <option {{old('department_id',$employee->department_id)==$department->id?'selected':''}} value='{{$department->id}}'>{{$department->department_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="city_id">City</label>
            <select class='form-control' name='city_id' id='city_id'>
                <option value=''>-Select-</option>
                @foreach($cities as $city)
                <option {{old('city_id',$employee->city_id)==$city->id?'selected':''}} value='{{$city->id}}'>{{$city->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
            <div class="col-md-6 mb-3 py-3">  
                <div class="custom-file">
                    <label for="name">Your Image</label>
                    <input type="file" class="form-control" name="file" id="file"  >
                </div>
            </div>                    
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">          
            <label>
            <input {{$employee->gender=='m'?"checked":""}} type="radio" value='m' name="gender" />
            Male
            </label>
            <label>
            <input {{$employee->gender=='f'?"checked":""}} type="radio" value='f' name="gender" />
            Female
            </label>
        </div>
    </div>
    <div class="row">
            <div class="col-md-6 mb-3">
            <label>
            <input {{$employee->active?"checked":""}} type="checkbox" name="active" />
            Active
            </label>
            </div>  
    </div> 
    <button class="btn btn-primary" type="submit">Update</button>
    <a class='btn btn-light' href='{{route("employees-model.index")}}'>Cancel</a>

</form>


@endsection
