<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function similarProduct (){
        return $this->belongsToMany('products', 'similar_products', 'child_product', 'master_product');
    }
    public function processingProduct (){
        return $this->belongsToMany('products', 'processing_product', 'child_product', 'master_product');
    }
    public function accessoriesProduct (){
        return $this->belongsToMany('products', 'accessories_product', 'child_product', 'master_product');
    }
}
