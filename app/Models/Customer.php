<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

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

}
