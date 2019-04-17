<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password','organization_name','organization_address', 'telephone_number', 'phone_number'
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function applications(){
        return $this->hasMany(Application::class);
    }
    
    /**
    **************************************************************************************************************
    * Things below are needed for using uuid
    **************************************************************************************************************
    */
    
    public $incrementing = false;
    
    protected $guarded = []; 
    
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($user) {
            $user->{$user->getKeyName()} = (string) Str::uuid();
        });
    }
    
    public function getKeyType()
    {
        return 'string';
    }
    
}
