<?php

namespace App\Models;

// use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;

=======
>>>>>>> develop

class Property extends Model
{
    use HasFactory;

    protected $fillable =[
        "title",
        "description",
        "surface",
        "rooms",
        "bedrooms",
        "floor",
        "price",
        "city",
        "address",
        "postal_code",
        "sold",
        "image",
    ];

    public function options(): BelongsToMany {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug() : string {
        return str::slug($this->title);
    }
<<<<<<< HEAD
    
    public function imageUrl() :string
    {
        return Storage::disk('public')->url($this -> image);
    } 
=======
>>>>>>> develop
}


