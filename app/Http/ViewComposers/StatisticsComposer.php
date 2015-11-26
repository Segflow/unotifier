<?php namespace App\Http\ViewComposers;

use App\Device;
use App\Etudiant;
use App\Professeur;
use App\Notification;
use DB;
class StatisticsComposer {

	/**
	 * Calculate stats data and bind it to the view
	 */
	public function compose($view) {
		$devs_count = Device::count();
		$users_count = Etudiant::count() + Professeur::count();
		$notifs_count = Notification::count();
		$sended_notifs_count = DB::table('notification_user')->count();

		$max_count = max([$devs_count, $users_count, $notifs_count, $sended_notifs_count]) * 1.1;

		$view->with(compact(['max_count', 'users_count', 'devs_count', 'notifs_count', 'sended_notifs_count']));
	}
}
