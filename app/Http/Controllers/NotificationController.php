<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\SeenRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;
use App\Notification;
use App\Services\PushSender;
use App\User;
use Flash;
use stdClass;

class NotificationController extends Controller {

	/**
	 * Handle the send request and redirect the user back to the send page
	 */
	public function send(Request $request) {
		$receivers = $this->parse_targets($request->receivers);
		$count = 0;

		$sender = Auth::user()->profile;
		$notif = new Notification(['content' => $request->notif_msg, 'subject' => $request->notif_subject]);
		$notif->sender()->associate($sender);
		$notif->save();

		foreach ($receivers as $user) {
			$notif_id = PushSender::send($notif, $user->profile->device);
			$notif_id = '545q';
			if ($notif_id) {
				$this->save_notification($notif, $user, $notif_id);
				$count++;
			}
		}

		if ($count == 0) {
			$notif->delete();
		}

		$tmp = $count > 1 ? str_plural('user') : 'user';
		$msg = sprintf('Your message was succefully sended to %d %s. Thank you for using our service!', $count, $tmp);
		Flash::overlay($msg, 'Done!');

		return redirect()->route('send_notifs_page');;
	}

	/**
	 * Prepare data for select2 plugin and send it to the 'send' view
	 */
	public function send_form()
	{
		$data = [];
		$user = Auth::user()->profile;
		$subs = $user->subordinates();

		foreach($subs as $groupe_name => $members) {
			$sub = new stdClass;
			$sub->id = '';
			$sub->text = $groupe_name;

			$childs = [];

			foreach ($members as $e) {
				$child = new stdClass;
				$child->id = $e->identifiant;
				$child->text = (string)$e;
				$childs[] = $child;
			}

			$sub->children = $childs;

			if (count($sub->children))
				$data[] = $sub;
		}

		return view('send_form')->with('data', json_encode($data));
	}

	/**
	 * Mark a notification as seen
	 */
	public function seen(SeenRequest $request) {
		$id = $request->get('id_msg');
		$status = DB::table('notification_user')->where('notif_id', $id)->update([
			'seen' => 1,
			'seen_at' => date("Y-m-d H:i:s")
		]);
		if ($status)
			return json_encode(['success' => 1, 'error' => 0]);
		return json_encode(['error' => 1, 'success' => 1]);
	}

	/**
	 * Detail a notification
	 */
	public function view($id) {
		$notif = Notification::find($id);
		if (!$notif) {
			Flash::error('Notification does not exist');
			return redirect()->route('list_notifs');
		}

		if ($notif->sender->identifiant != Auth::user()->identifiant) {
			Flash::error('You are not authorized to access the designed notification');
			return redirect()->route('list_notifs');
		}
		return view('list_receivers')->with('notif', $notif);
	}


	/**
	 * List all notifications send by the current user
	 */
	public function list_notifications() {
		$notifs = Auth::user()->profile->notifications()->orderBy('created_at', 'DESC')->get();
		//return $notifs;
		return view('list_notifications')->with('notifs', $notifs);
	}


	/**
	 * Assign notification to the user
	 */
	private function save_notification($notif, $receiver, $notif_id) {
		$notif->receivers()->attach($receiver->identifiant, ['notif_id' => $notif_id]);
	}


	/**
	 * Parse receivers and return an array of User
	 */
	private function parse_targets($receivers) {
		$receivers = explode(',', $receivers);
		$users = [];
		foreach ($receivers as $user_id) {
			$user = User::find($user_id);
			$users[] = $user;
		}
		return $users;
	}

}
