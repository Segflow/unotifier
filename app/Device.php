<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model {

	protected $fillable = ['token', 'type'];


	public function user()
	{
	 	return $this->belongsTo('App\User', 'user_id');
	}

}
