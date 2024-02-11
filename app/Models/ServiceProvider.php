<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;
    protected $table = 'service_providers';
    protected $fillable = [
        'user_id', // Include user_id here if it should be mass assignable
        'county_id',
        'subcounty_id',
        'ward_id',
        'area_id',
        'contact_information',
        'profile_pic',
        'gender',
        'qualifications',
        'business_name',
        'business_description',
        'website',
        'service_category_id',
        'service_id',
        // Add other attributes here if needed
    ];
    

    // Add relationships if needed

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function subcounty()
    {
        return $this->belongsTo(Subcounty::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

  
public function service()
{
    return $this->belongsTo(Service::class);
}

}
