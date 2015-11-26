<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

	protected $fillable = ['content', 'link', 'subject'];

	public function sender()
	{
	 	return $this->belongsTo('App\User');
	}

	public function receivers() {
		return $this->belongsToMany('App\User', 'notification_user')->withPivot('seen', 'seen_at', 'notif_id')->withTimestamps();
	}

}
