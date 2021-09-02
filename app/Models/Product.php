<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'features',
        'price',
        'keywords',
        'url',
        'category_id',
        'subcategory'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
