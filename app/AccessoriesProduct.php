<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessoriesProduct extends Model
{
    //
    protected $table = 'accessories_product';
    protected $fillable = ['master_product','child_product'];
}
