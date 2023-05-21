<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimilarProduct extends Model
{
    //
    protected $table = 'similar_products';
    protected $fillable = ['master_product','child_product'];
}
