<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemAndIuss extends Model
{
 
     protected $table = 'problem_and_iusses' ;

     protected $fillable = [
  
        'user_id',
     //   'type',
        'message'
     ] ;
}
