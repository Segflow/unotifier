<?php namespace App;

use Illuminate\Database\Eloquent\Collection;

trait TraitUserModel {
    
    public function device() {
		return $this->hasOne('App\Device', 'user_id');
	}

	public function subgroupes() {
		return $this->belongsToMany('App\Groupe', 'gestion_groupe', 'user_id')->withTimestamps();
	}

	public function subordinates() {
		$groupes = new Collection;
		foreach($this->subgroupes as $subgroupe) {
			$groupes[$subgroupe->groupe_name] = $subgroupe->members->filter(function ($el) {
				return !is_null($el->profile->device);
			});
		}
		return $groupes;
	}

	public function notifications() {
		return $this->hasMany('App\Notification', 'sender_id');
	}

	public function groupes() {
		return $this->belongsToMany('App\Groupe', 'memberships', 'user_id')->withTimestamps();
	}

	public function user() {
		return $this->morphOne('App\User', 'profile', null, 'identifiant');
	}

}