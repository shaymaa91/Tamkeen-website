<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContName extends Controller
{
    public function resourceExample(){ 
        return view("examples.resource");
    }
}
/*
// CRUD APP >>> I need to use Resource Controller >> اختياري 
// لانه انا قادر ابني الريسورس كونترولر بايدي من الصفر
//الفرق الاول بين الريسورس كونترولر والعادي
// CRUD app >> resource 
Resource cont. >> مجهزلي دوال الكرد عشان بس اعبي كودي فيها
>> بكون مجهزلي الروتس اللي انا بحتاجها عشان ادخل عالدوال او انادي الفنكشنز واشغلها

*/