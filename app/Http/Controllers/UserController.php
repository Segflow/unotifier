<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterDeviceRequest;
use App\Device;
use App\User;
use App\Groupe;
use stdClass;

class UserController extends Controller {

	/**
	 * Returns current's user subordinates
	 */
	public function subordinates() {
		$user = Auth::user()->profile;
		return $user->subordinates();
	}

	/**
	 * Register the user device
	 */
	public function register(UserRegisterDeviceRequest $request)
	{
		$data = $request->all();

		// Check for device
		if (Device::whereTokenAndType($data['token'], $data['type'])->count()) {
			return json_encode([
				'success' => '0',
				'error' => 'This device is already registred'
			]);
		}

		// Check for user
		$user = User::find($data['identifiant']);
		if (!$user) {
			return json_encode([
				'success' => '0',
				'error' => 'This user does not exist.'
			]);
		}


		// Every thing is OK, add his device!
		if (is_null($user->profile->device))
			$user->profile->device()->create($data);
		else {
			$user->profile->device->update(['token' => $data['token']]);
		}
		return json_encode([
			'success'=> '1',
			'error' => '0'
		]);
	}

	/**
	 * Create a new user
	 */
	public function create(Request $request) {
		$data = [];
		$groupes = Groupe::all();

		foreach($groupes as $groupe) {
			$sub = new stdClass;
			$sub->id = $groupe->groupe_name;
			$sub->text = $groupe->groupe_name;
			$data[] = $sub;
		}
		return view('create_user')->with('all_groupes', json_encode($data));
	}

}
