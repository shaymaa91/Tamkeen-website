<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{
    public function index(){
        $items = \DB::table('departments')->get();
        return view("welcomeToDepartments")->withItems($items);
        }
}

