<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    use HasFactory;
    protected $fillable = ['supplier_id', 'product_id', 'quantity', 'total_price', 'status'];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
