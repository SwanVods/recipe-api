<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredient_name',
        'ingredient_amount',
        'ingredient_unit',
        'ingredient_food_id',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function foodCategory()
    {
        return $this->belongsToThrough(FoodCategory::class, Food::class);
    }
}
