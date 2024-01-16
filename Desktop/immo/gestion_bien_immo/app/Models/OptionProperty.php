<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionProperty extends Model
{
    use HasFactory;

    protected $table = 'option_property';

    protected $fillable = ['option_id', 'property_id'];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
