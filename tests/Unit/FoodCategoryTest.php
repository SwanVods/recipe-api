<?php

namespace Tests\Unit;

use App\Models\FoodCategory;
use Str;
use Tests\TestCase;

class FoodCategoryTest extends TestCase
{
    public function createFoodCategory(string $name = null) {

        if($name == null) {
            $name = Str::random(6);
        }

        $object = FoodCategory::where('food_category_name', 'TestName_'. $name)->first();
        if($object != null) {
            return $object->id;
        } else {
            $foodCategory = FoodCategory::factory()->create([
                'food_category_name' => 'TestName_'. $name
            ]);

            return $foodCategory->id;
        }
    }

    public function test_return_all_categories() : void 
    {
        $this->createFoodCategory('Dessert');
        $this->createFoodCategory('Appetizer');
        $this->createFoodCategory('Beverage');
        $this->createFoodCategory('Side Dish');

        $query = FoodCategory::all();

        $this->assertCount($query->count(), $query);
    }

    public function test_return_category_by_id() : void 
    {
        $validId = $this->createFoodCategory('Main Dish');
        $query = FoodCategory::find($validId);

        $this->assertArrayHasKey('food_category_name', $query);
    }

    public function test_return_category_by_name() : void 
    {
        $validName = $this->createFoodCategory('Main Dish');
        $query = FoodCategory::where('food_category_name', 'TestName_Main Dish')->first();

        $this->assertArrayHasKey('food_category_name', $query);
    }

    public function test_update_category() : void 
    {
        $validId = $this->createFoodCategory('Main Dish');
        $query = FoodCategory::find($validId);
        $query->food_category_name = 'TestName_Edited';
        $query->save();

        $this->assertEquals('TestName_Edited', $query->food_category_name);
    }

    public function test_delete_category() : void 
    {
        $validId = $this->createFoodCategory('Main Dish');
        $query = FoodCategory::find($validId);
        $query->delete();

        $this->assertNull(FoodCategory::find($validId));
    }
}
