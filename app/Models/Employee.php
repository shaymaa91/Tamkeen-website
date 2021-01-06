<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'gender',
        'department_id',
        'city_id',
        'active',
        'file'
    ];

    public function department(){
        return $this->belongsTo(department::class);
    }

    public function city(){
        return $this->belongsTo(city::class,'city_id','id');
    }
}
