<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relacion uno a muchos
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    //Relacion uno a muchos atravez de subcategorias
    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    //Url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
