<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    //Relacion uno a muchos inversa
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
