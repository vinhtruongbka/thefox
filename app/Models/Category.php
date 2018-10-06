<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{	
   protected $table ="category";
    protected $fillable = [
        'id', 'name','slug','desc','status'
    ];
   /*public function product()
   {
   	 return $this->hasMany('App\Models\product','id_category','id');
   }*/
}
 ?>