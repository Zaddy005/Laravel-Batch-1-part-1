<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class staffsController extends Controller
{
    public function staffs(){
        return view('staffs/home');
    }

    public function index(){
        return view('staffs/home');
    }

    public function party(){
        return view('staffs/party');
    }

    public function total($total){
        return view('staffs/partytotal',['total'=>$total]);
    }

    public function confirm($total,$confirm){
        return view('staffs/partytotalconfirm',["total"=>$total,"status"=>$confirm]);
    }


}
