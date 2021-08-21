<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

	public function __construct(){
	//	$this->middleware('auth'); подключено в роутах
    $this->middleware('can:admin-panel');
	}


	public function index(){
		return view('admin.home');
	}
}
