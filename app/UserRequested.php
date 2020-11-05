<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequested extends Model
{
    protected $fillable = [
        'id', 'user_id', 'name', 'email', 'gender', 'country', 'company', 'data_requested', 'date', 'zip_file', 'status', 'notif'
    ];

    public $table = "user_requested";
}
