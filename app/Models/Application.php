<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['status'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
