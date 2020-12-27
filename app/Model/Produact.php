<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Produact extends Model
{

    use SoftDeletes, SearchableTrait;

    protected $dates = ['deleted_at'];

    protected $table = 'produacts';
    protected $fillable = [
        'id',
        'admin_id',
        'user_id',
        'color_name',
        'cate_name',
        'price',
        'size_id',
        'cate_image',
        'cate_disc',
        'cate_id',
        'stutus_admin',
        'stutus',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'admin_id',
        'user_id',
        'stutus',
        'stutus_admin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $searchable = [

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

    public function admin()
    {
        return $this->hasOne(\App\Admin);
    }
    public function color_id()
    {
        return $this->hasOne(\App\Model\Color::class, 'id', 'color_id');
    }

    public function size_id()
    {
        return $this->hasOne(\App\Model\Size::class, 'id', 'size_id');
    }

    public function cate_id()
    {
        return $this->hasOne(\App\Model\Categories::class, 'id', 'cate_id');
    }

}
