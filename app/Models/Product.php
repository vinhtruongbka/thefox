<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{	
   protected $table ="product";
    protected $fillable = [
        'id', 'id_category','name','price','sale_price','description','status','slug','content','color','brand','hot','merchandise','image_link'
    ];
}
 ?>