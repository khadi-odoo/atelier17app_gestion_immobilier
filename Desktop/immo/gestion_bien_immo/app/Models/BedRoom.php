<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class BedRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'surface',
        'description',
        'toilet',
        'balcony',
        'property_id',
    ];

    //relations
    public function Property() : BelongsTo 
    {
        return $this -> BelongsTo(Property::class);
    }

}
