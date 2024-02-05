<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcounty extends Model
{
    use HasFactory;
    protected $table = 'subcounties';
    protected $fillable = [
        'subcounty_name',
        'county_id ',

        // Add other fields as needed
    ];

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
