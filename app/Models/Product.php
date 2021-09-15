<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model {
    use HasFactory;

	public $timestamps = false;

    protected $fillable = [
        'id',
		'code',
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
        return $this->belongsTo(Category::class, 'category_id');
    }
}
