<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model {

	
	protected $fillable = ['groupe_name'];

	public function members() {
		return $this->belongsToMany('App\User', 'memberships');
	}

	public function __toString() {
		return $this->groupe_name;
	}

}

// Administrateur manage all groupes!
Groupe::saved(function($groupe) {
	$admin = Administrateur::get()->first();
	$admin->subgroupes()->attach($groupe->id);
});
