<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'content', 'parent_id'];
    protected $primaryKey = 'id';

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id' );
    }
}
