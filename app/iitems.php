<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iitems extends Model
{
    //
    protected $table = 'iitems';

    protected $fillable = ['Name','UserId','Cat_id','Image','Description','Status'];
}
