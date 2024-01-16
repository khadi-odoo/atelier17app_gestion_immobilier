<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Commentaires extends Model
{
    use HasFactory;


    protected $fillable = [
        'contenu',
    
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function property()
    {
        return $this->belongsToMany(Property::class);
    }
}
