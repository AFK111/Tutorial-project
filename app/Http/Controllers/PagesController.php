<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{



  public function index(){
    $title='Hello to index';
    return view('Pages.index')->with('title',$title);  //may be array within braces of with function
  }//index function

  public function about(){
    return view('Pages.about');
  }//about function


  public function services(){

    $data=[
      'title' => 'The following services are provided: ',
      'services' => [
        'programming','automation','web design'
      ]
    ];
    return view('Pages.services')->with($data);
  }//services function




}//class PagesController
