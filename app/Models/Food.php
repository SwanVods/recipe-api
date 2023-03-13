<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_name',
        'food_description',
        'food_category_id',
    ];

    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }


}
