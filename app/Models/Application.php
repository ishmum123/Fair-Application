<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id','festival_name','festival_type','from','to','festival_place','festival_place_attach','applicant_name',
        'applicant_address','applicant_email','reg_no','reg_no_attach','tin_no','tin_no_attach','vat_reg_no','vat_reg_no_attach',
        'chaalan_no','date','bank_name','branch_name','fee_type'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
