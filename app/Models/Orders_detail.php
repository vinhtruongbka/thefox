<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders_detail extends Model
{	
   protected $table ="orders_detail";
    protected $fillable = [
        'id', 'orders_id','product_id','quantity','amount','size'
    ];
}
 ?>