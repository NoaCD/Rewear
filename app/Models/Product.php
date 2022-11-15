<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const BORRADOR = 1, PUBLICADO = 2;

    //Relacion uno a muchos
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //Relacion muchos a muchos
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('id');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class)->withPivot('id');;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    //Relacion uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    //Asignamos el slug como key para url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
