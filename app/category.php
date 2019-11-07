<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = 'icategory';

    protected $fillable = ['Category_Name','Status'];
}
