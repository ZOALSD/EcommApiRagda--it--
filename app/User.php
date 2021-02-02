<?php

namespace App;

use App\Model\Area;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone',
        'year', 'type',
        'area_id',
        'village_id',
        'photo',
        'stuts',
        'stuts_delivery',
    ];

    public function area()
    {
        return $this->belongsTo('App\Model\Area');
    }

    public function village()
    {
        return $this->belongsTo('App\Model\Village', 'village_id');
    }
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'users.name' => 10,
            'users.phone' => 10,
            //  'users.area_id' => 5,
        ],
        // 'joins' => [
        //     'area' => ['users.area_id'],
        // ],
    ];

    // public function area()
    // {
    //     return $this->hasOne(Area::class);
    // }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'updated_at', 'email_verified_at',
        'village_id',
        'stuts',
        'stuts_delivery',
    ];
}
