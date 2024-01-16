<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    /** @var relations */
    public function user() : hasMay 
    {
        return $this-> hasMany(User::class)->with('role_id');
    }

    
}


