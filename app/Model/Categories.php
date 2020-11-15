<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Categories extends Model {

	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'categories';
protected $fillable = [
		'id',
		'admin_id',
		'Parent_id',
        'name',
        'image_cate',
         'created_at',
		'updated_at',
		'deleted_at',
	];



	public function Parent()
	{
		return $this->belongsTo('App\Model\Categories', 'Parent_id');
	}


	 protected $hidden = ['updated_at , deleted_at , admin_id'];
	
}