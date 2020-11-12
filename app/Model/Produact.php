<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Produact extends Model {

	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'produacts';
protected $fillable = [
		'id',
		'admin_id',
		              'color_id',
'cate_name',

'quantity',
'size_id',

'cate_image',
'cate_disc',
'cate_id',

		'created_at',
		'updated_at',
		'deleted_at',
	];

   public function color_id(){
      return $this->hasOne(\App\Model\Color::class,'id','color_id');
   }

   public function size_id(){
      return $this->hasOne(\App\Model\Size::class,'id','size_id');
   }

   public function cate_id(){
      return $this->hasOne(\App\Model\Categories::class,'id','cate_id');
   }

}