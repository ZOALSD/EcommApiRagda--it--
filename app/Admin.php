<?php
namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable {
	use HasRoles , Notifiable;
	
	protected $table    = 'admins';
	protected $fillable = [
		'email',
		'name',
		'phone',
		'photo_profile',
		'password',
		'group_id',
		'remember_token',
	];

	protected $hidden = ['password'];
}