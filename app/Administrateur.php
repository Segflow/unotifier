<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model {
	use TraitUserModel;
	
    protected $fillable = ['universite', 'identifiant'];
	protected $primaryKey = 'identifiant';


	public function __toString() {
		return 'Administrateur';
	}

}
