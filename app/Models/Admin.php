<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable
{
    use HasFactory;
    protected $guarded=[];
    protected $guard="admins";

    public function vendorPersonal(){
        return $this->belongsTo(Vendor::class,'vendor_id');
    }
    public function vendorBusiness(){
        return $this->belongsTo(VendorsBusinessDetails::class,'vendor_id');
    }
    public function vendorBank(){
        return $this->belongsTo(VendorsBankDetails::class,'vendor_id');
    }
}
