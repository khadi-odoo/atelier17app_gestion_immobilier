<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class LivingRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'toilet',
    ];

    //relations
    public function Property() : BelognsTo 
    {
        return $this -> belongsTo(Property::class);
    }
}
