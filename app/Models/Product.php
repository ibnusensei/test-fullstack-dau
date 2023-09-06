<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'stock',
        'description'
    ];

    public function transactions() 
    {
        return $this->hasMany(Transaction::class);
    }

    public function scopeSearchable($query)
    {
        return $query->where('name', 'like', '%'.request('search').'%');
    }

    public function getGetSoldAttribute()
    {
        return $this->transactions()->sum('quantity');
    }
}
