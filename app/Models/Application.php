<?php

namespace App\Models;

use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Application extends Model
{
    protected $fillable = [
        'application_id','festival_name','festival_type','from','to','festival_place','festival_place_attach','applicant_name',
        'applicant_address','applicant_email','reg_no','reg_no_attach','tin_no','tin_no_attach','vat_reg_no','vat_reg_no_attach',
        'chaalan_no','date','bank_name','branch_name','fee_type'
    ];
    
    public function district(){
        return $this->belongsTo(District::class);
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
        
        static::creating(function ($application) {
            $application->{$application->getKeyName()} = (string) Str::uuid();
        });
    }
    
    public function getKeyType()
    {
        return 'string';
    }

}
