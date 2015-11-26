<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GroupeController extends Controller {


	/**
	 * Show the form for managing groupes.
	 *
	 */
	public function manage()
	{
		return view('manage_groupe');
	}

	/**
	 * Store a newly config.
	 *
	 */
	public function store()
	{
		//
	}
}
