<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password_reset extends Model
{
    protected $primaryKey = "email";

    public $timestamps = false;
}