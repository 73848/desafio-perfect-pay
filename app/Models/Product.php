<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'client_id',
        'description',
        'name',
        'price'
    ];
    protected $table = 'products';
    public function client() 
    {
        return $this->belongsToMany(Client::class, 'product_id' );
    }
}
