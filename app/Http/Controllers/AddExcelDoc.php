<?php

namespace App\Http\Controllers;

use App\Models\Zakaz;
use Illuminate\Http\Request;

class AddExcelDoc extends Controller
{
   public function index(){

       $addList = Zakaz::select(Zakaz::$availableFields)->simplePaginate(50);;

       return view('file.index',
       [
           'addList' =>$addList
       ]);
   }



}
