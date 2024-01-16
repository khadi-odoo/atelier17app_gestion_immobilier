<?php

namespace App\Models;

use App\Models\Picture;
use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function Property() : BelongsTo 
    {
        return $this -> belongsTo(Property::class);
    }
    
    public function pictures() : HasMany
    {
        return $this -> hasMany(Picture::class);
    }
}
