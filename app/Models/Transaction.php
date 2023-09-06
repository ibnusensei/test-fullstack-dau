<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference_no',
        'price',
        'quantity',
        'payment_amount',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeSearchable($query)
    {
        return $query->join('products', 'transactions.product_id', '=', 'products.id')
            ->select('transactions.*', 'products.name as product_name')
            ->where('products.name', 'like', '%'.request('search').'%')
            ->orWhere('reference_no', 'like', '%'.request('search').'%')

        ;
    }
}
