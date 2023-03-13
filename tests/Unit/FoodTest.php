<?php

namespace Tests\Unit;

use App\Models\FoodCategory;
use Tests\TestCase;
use App\Models\Food;
use Str;

class FoodTest extends TestCase
{
    public function createFood(string $name = null) 
    {        
        if($name == null) {
            $name = Str::random(6);
        }

        $object = Food::where('food_name', 'TestName_'. $name)->first();
        if($object != null) {
            return $object->id;
        } else {
            $food = Food::factory()->create([
                'food_name' => 'TestName_'. $name,
                'food_description' => 'TestDescription',
                'food_category_id' => FoodCategory::inRandomOrder()->first()
            ]);

            return $food->id;
        }
    }

    public function test_return_all_foods() : void 
    {
        $this->createFood('Dessert');
        $this->createFood('Appetizer');
        $this->createFood('Beverage');
        $this->createFood('Side Dish');

        $query = Food::all();

        $this->assertCount($query->count(), $query);
    }

    public function test_return_food_by_id() : void 
    {
        $validId = $this->createFood('Main Dish');
        $query = Food::find($validId);

        $this->assertArrayHasKey('food_name', $query);
    }

    public function test_return_food_by_name() : void 
    {
        $validName = $this->createFood('Main Dish');
        $query = Food::where('food_name', 'TestName_Main Dish')->first();
        $this->assertArrayHasKey('food_name', $query);
    }

    public function test_update_food() : void 
    {
        $validId = $this->createFood('Main Dish');
        $query = Food::find($validId);
        $query->food_name = 'TestName_Edited';
        $query->save();

        $this->assertEquals('TestName_Edited', $query->food_name);
    }

    public function test_delete_food() : void 
    {
        $validId = $this->createFood('Main Dish');
        $query = Food::find($validId);
        $query->delete();

        $this->assertNull(Food::find($validId));
    }
}
