<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoModel;

class Videos extends Controller
{
   
    public function index()
    {

        $videos = VideoModel::all();

        return view('welcome', ['videos' => $videos]);
        
    }

    public function index2(){

    

        return view('welcome');
        
    }

    public function cadastro(Request $request){
        
    }


}
