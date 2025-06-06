<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    use HasFactory;
    protected $fillable = ['name', 'contact_person', 'email', 'phone', 'address'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
