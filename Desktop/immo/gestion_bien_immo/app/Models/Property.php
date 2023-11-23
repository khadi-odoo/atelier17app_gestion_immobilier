<?php

namespace App\Models;

// use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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
        "sold",
    ];

    public function options(): BelongsToMany {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug() : string {
        return str::slug($this->title);
    }
    
    public function imageUrl() :string
    {
        return Storage::disk('public')->url($this -> image);
    } 
}


