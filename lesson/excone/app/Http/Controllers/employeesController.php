<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class employeesController extends Controller
{
    public function index(){

        $data['employees']=[
            'name'=>'Aung ko ko',
            'email'=>'aungkoko@gmail.com',
            'phone'=>'09123456'
        ];


//        dd($data);

        return view('employees/index',$data);

    }

    public function passingdataone(){
        $fullname = "Honey Nway Oo";
        $city = 'mandalay';
        return view('employees/dataone',['fullname'=>$fullname,'city'=>$city]);
    }

    public function passingdatatwo(){
        $greeting = "hello";
        $students = [
            'Zaddy',
            'yangon',
            '011111'
        ];
        return view('employees/datatwo',['students'=>$students,'greeting'=>$greeting]);
    }

    public function passingdatathree(){
        $greeting = "hello";
        $students = [
            'Zaddy',
            'yangon',
            '011111'
        ];
        return view('employees/datathree')->with('greeting',$greeting)->with('students',$students);
    }

    public function passingdatafour(){
        $greeting = "hello";
        $students = [
            'zaddy',
            'yangon',
            '011111'
        ];
//        return view('employees/datafour',compact('greeting','students'));
//        return view('employees/datafour',compact('greeting'))->with('students',$students);
//        return view('employees/datafour',compact('greeting'),compact('students'));
//        return view('employees/datafour',compact('  greeting'))->with(compact('students'));
        return view('employees/datafour')->with(compact('greeting'))->with(compact('students'));
    }

    // 6.11 June
    public function show(){

        $data['employees']=[
            'name'=>'Aung ko ko',
            'email'=>'aungkoko@gmail.com',
            'phone'=>'09123456'
        ];

        return view('employees/show',$data);
    }

    public function edit(){
        $data['employees']=[
            'name'=>'Aung ko ko',
            'email'=>'aungkoko@gmail.com',
            'phone'=>'09123456'
        ];

        return view('employees/edit',compact('data'));
    }

    public function delete(){
        $data['employees']=[
            'name'=>'Aung ko ko',
            'email'=>'aungkoko@gmail.com',
            'phone'=>'09123456'
        ];
        return view('employees/delete',['employee'=>$data['employees']]);
    }

}

