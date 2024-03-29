<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
    ];

    public function property() : BelongsTo 
    {
        return $this -> belongsTo(Property::class);
    }

    public function bedRooms() : BelongsTo
    {
        return $this ->belongsTo(BedRoom::class);

    }
    public function linvingRooms() : BelongsTo
    {
        return $this ->belongsTo(LivingRoom::class);
    }

   
    
}
