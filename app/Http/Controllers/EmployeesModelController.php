<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Employee;
use App\Models\Department;
use App\Models\City;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Storage;

class EmployeesModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $city = $request->city;
        $department = $request->department;
        $active = $request->active;
        $gender = $request->gender;

        $query = employee::whereRaw('true');
        if($gender){
            $query->where('gender',$gender);
        }
        if($active!=''){
            $query->where('active',$active);
        }

        if($city){
            $query->where('city_id',$city);
        }
        if($department){
            $query->where('department_id',$department);
        }
        if($q){
            $query->whereRaw('(fname like ? or lname like ? or email like ? or phone like?)',["%$q%","%$q%","%$q%","%$q%"]);
        }

        
        $employees = $query->paginate(7)
        ->appends([
            'q'     =>$q,
            'city'=>$city,
            'department'=>$department,
            'gender'=>$gender,
            'active'=>$active
        ]);

        $cities = city::all();
        $departments = department::all();
        return view("employees-modelviews.index",compact('employees','cities','departments')); 
        
       
        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = department::all();
        $cities = city::all();
        return view("employees-modelviews.create",compact('departments','cities'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        
        $fileName = $request->file->store("public/image");
        $imageName = $request->file->hashName();
        
        $requestData = $request->all();
        $requestData['file'] = $imageName;
        
        Employee::create($requestData);
        Session::flash("msg","s: Created Successfully");
        return redirect(route("employees-model.index"));        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        if(!$employee){
            session()->flash("msg","w:Invalid Id");
            return redirect(route("employees-model.index"));
        }
        return view("employees-modelviews.show",compact('employee'));
    }

     public function getFile($file){

        return Storage::download("public/image/$file");
        
        
     }
     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        if(!$employee){
            session()->flash("msg","e:Invalid Id");
            return redirect(route("employees-model.index"));
        }
        
        $departments = department::all();
        $cities = city::all();
        return view("employees-modelviews.edit",compact('employee','departments','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employeeDB = Employee::find($id);
        $request['active'] = isset($request['active'])?1:0;
        
        if($request['file']){
            $fileName = $request->file->store("public/image");
            $imageName = $request->file->hashName();
            $requestData = $request->all();
            $requestData['file'] = $imageName;            
            $employeeDB->update($requestData);
        }
        else{
            
            employee::where('id', $id)->update(array('fname' => $request['fname'],
                                                     'lname'=> $request['lname'],
                                                     'email'=> $request['email'],
                                                     'phone'=> $request['phone'],
                                                     'gender'=> $request['gender'],
                                                     'department_id'=> $request['department_id'],
                                                     'city_id'=> $request['city_id'],
                                                     'active'=> $request['active']
                                                    ));
        }
        
        
        session()->flash("msg","s:Employee Updated Successfully");
        return redirect(route("employees-model.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("employees")->where("id",$id)->delete();
        session()->flash("msg","w:employee Deleted Successfully");
        return redirect(route("employees-model.index"));
    }
}
