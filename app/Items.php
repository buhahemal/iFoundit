<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    //
    protected $table = 'iitems';

    protected $fillable = ['Name'];
}
