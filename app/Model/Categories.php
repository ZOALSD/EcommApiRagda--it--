<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Categories extends Model
{

    use SoftDeletes, SearchableTrait;
    protected $dates = ['deleted_at'];

    protected $table = 'categories';
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

        'columns' => [
            'categories.name' => 10,
        ],
        //    'joins' => [
        //       'admins' => ['admins.id','produacts.admin_id'],
        //   ],
    ];

    public function subcategory()
    {
        return $this->hasMany('App\Model\Categories', 'parent_id');
    }

    public function Parent_i()
    {
        return $this->hasOne(\App\Model\Categories::class, 'id', 'Parent_id');
    }

    public function Parent()
    {
        return $this->belongsTo(self::class, 'id');
    }

    protected $hidden =
        [

        'created_at',
        'updated_at ,
		 deleted_at ,
		  admin_id',
    ];

}
