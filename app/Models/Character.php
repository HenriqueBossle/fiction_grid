<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'description',
        'franchise_id',
        'image',
    ];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }
}

