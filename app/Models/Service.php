<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    protected $fillable = ['category_id', 'name'];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
    public function serviceProviders()
{
    return $this->hasMany(ServiceProvider::class);
}

}