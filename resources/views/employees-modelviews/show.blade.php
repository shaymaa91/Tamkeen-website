@extends('layouts.main')
@section('title','All Employees')
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')
<h2 class="text-center m-5 pt-5"> {{$employee->fname }} {{$employee->lname }} Details</h2>

<div class="container d-flex justify-content-center align-items-center flex-column">
    <div class="card mb-3" style="max-width: 640px;">
        <div class="row no-gutters">
            <div class="col-md-4 pt-3">
                @if($employee->file =='')
                    <img class="card-img" src='/storage/image/no-image.jpg'/>
                @else
                    <img class="card-img" src='/storage/image/{{$employee->file}}'>
                    
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$employee->fname }} {{$employee->lname }}</h5>
                    <p class="card-text">
                        <ul> 
                                    <li>email:  {{ $employee->email }}</li>
                                    <li>phone:  {{ $employee->phone }}</li>
                                    <li>department:  {{ $employee->department->department_name??'' }}</li>
                                    <li>city:  {{ $employee->city->name??'' }}</li> 
                                    <li>Gender:  {{$employee->gender=='m'?"Male":"Female"}}</li>  
                        </ul>
                    </p>
                    
                </div>
            </div>
        </div>
    
    </div>
    <div class="">
        <p class="card-text">
                <a href='{{ route("employees-model.edit",$employee->id) }}' class='btn btn-sm btn-info'>Edit</a>
                <a class='btn btn-light' href='{{route("employees-model.index")}}'>Cancel</a>
        </p>
    </div>
    
</div>
@endsection
