<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = [
        'name', 'state', 'adress','user_id', 'mail','phone_number',
    ];
}
