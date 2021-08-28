<?php

namespace App\Http\Controllers\Api;

use App\Models\Ajax;
use App\Models\Teacher;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AjaxController extends Controller
{
    public function index(){
        return view('get-ajax-data');
      }
     
      public function getData($id = 0){
        // get records from database
     
        if($id==0){
          $arr['data'] = StudentClass::orderBy('id', 'asc')->get(); 
        }else{
          $arr['data'] = Teacher::where('id', $id)->first();
        }
        echo json_encode($arr);
        exit;
      }
}