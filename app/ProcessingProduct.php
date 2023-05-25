<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessingProduct extends Model
{
    //
    protected $table = 'processing_product';
    protected $fillable = ['master_product','child_product'];
}
