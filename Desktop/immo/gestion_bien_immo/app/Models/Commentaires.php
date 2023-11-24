<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function biens()
    {
        return $this->belongsToMany(Biens::class);
    }
}
