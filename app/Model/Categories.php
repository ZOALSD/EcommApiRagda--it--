<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Categories extends Model {

	use SoftDeletes , SearchableTrait;
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


	protected $searchable = [
		/**
		 * Columns and their priority in search results.
		 * Columns with higher values are more important.
		 * Columns with equal values have equal importance.
		 *
		 * @var array
		 */
		'columns' => [
			'categories.name' => 10
		],
	 //    'joins' => [
	 //       'admins' => ['admins.id','produacts.admin_id'],
	 //   ],
	];

	public function subcategory(){
        return $this->hasMany('App\Model\Categories', 'parent_id');
    }


	public function Parent_i(){
		return $this->hasOne(\App\Model\Categories::class,'id','Parent_id');
	 }
  
	
	public function Parent()
	{
		return $this->belongsTo(self::class,'id');
	}


	 protected $hidden = ['updated_at , deleted_at , admin_id'];
	
}