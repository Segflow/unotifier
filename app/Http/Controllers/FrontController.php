<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
class FrontController extends Controller {

	public function contact(Request $request) {
		Flash::info('Your notification was sent successfully.');

		return redirect()->route('home');
	}

	public function home() {
		return view('home');
	}
	
}
