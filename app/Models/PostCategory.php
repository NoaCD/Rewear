<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = "post_categories";
    protected $fillable=['name','name_en'];

    //Relacion uno a muchos
    public function posts(){
        return $this->hasMany(Post::class);
    }

}
