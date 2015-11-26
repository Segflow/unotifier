<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model {
	use TraitUserModel;
	
	protected $fillable = ['nom', 'prenom', 'identifiant'];
	protected $primaryKey = 'identifiant';
	
	public function __toString() {
		return $this->nom . ' ' . $this->prenom;
	}


}
