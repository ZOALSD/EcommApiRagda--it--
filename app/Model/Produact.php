<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Produact extends Model {

	use SoftDeletes , SearchableTrait;

	protected $dates = ['deleted_at'];

protected $table    = 'produacts';
protected $fillable = [
		'id',
		'admin_id',
		              'color_id',
'cate_name',

'price',
'size_id',

'cate_image',
'cate_disc',
'cate_id',

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
         //'produacts.color_id' => 10,
          'produacts.cate_name' => 10,
         'produacts.quantity' => 2,
          'produacts.cate_disc' => 5,
          //'produacts.cate_id' => 5,
          
      ],
   //    'joins' => [
   //       'admins' => ['admins.id','produacts.admin_id'],
   //   ],
  ];

   public function admin(){
      return $this->hasOne(\App\Admin);
   }
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