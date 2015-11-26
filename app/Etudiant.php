<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model {
	use TraitUserModel;
	
	protected $fillable = ['nom', 'prenom', 'cin', 'identifiant'];
	protected $primaryKey = 'identifiant';
	
	public function __toString() {
		return $this->nom . ' ' . $this->prenom;
	}

}
