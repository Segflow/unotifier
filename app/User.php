<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Administrateur;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $fillable = ['identifiant', 'password'];
	protected $primaryKey = 'identifiant';

	/**
	 * The attributes excluded from the model's JSON form.
	 */
	protected $hidden = ['password', 'remember_token'];

	public function profile()
	{
	 	return $this->morphTo(null, 'profile_type', 'identifiant');
	}

	public function isAdmin() {
		return $this->profile instanceof Administrateur;
	}

	public function __toString() {
		return (string)$this->profile;
	}

}
