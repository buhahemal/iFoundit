<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_info extends Model
{
    //
    protected $table = 'iadmin';

    protected $fillable = ['Username','Password','Email'];
}
