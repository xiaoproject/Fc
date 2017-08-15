<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'fc_user';
    protected $primaryKey = 'id';
    public $timestamps  = false;
    protected $guarded = [];
}
