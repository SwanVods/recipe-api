<?php

namespace Tests\Unit;

use App\Models\Food;
use Tests\TestCase;
use Str;
use App\Models\Ingredient;

class IngredientTest extends TestCase
{
    public function createIngredient(string $name = null) {
            
            if($name == null) {
                $name = Str::random(6);
            }

            $object = Ingredient::where('ingredient_name', 'TestName_'. $name)->first();
            if($object != null) {
                return $object->id;
            } else {
                $ingredient = Ingredient::factory()->create([
                    'ingredient_name' => 'TestName_'. $name,
                    'ingredient_amount' => rand(1, 10),
                    'ingredient_unit' => 'TestUnit',
                    'ingredient_food_id' => Food::inRandomOrder()->first()
                ]);
    
                return $ingredient->id;
            }
    }

    public function test_return_all_ingredient_by_food() : void 
    {
        $this->createIngredient('Sugar');
        $this->createIngredient('Rice');
        $this->createIngredient('Flour');
        $this->createIngredient('Side Ingredient');

        $query = Ingredient::all();

        $this->assertCount($query->count(), $query);
    }

    public function test_return_ingredient_by_id() : void 
    {
        $validId = $this->createIngredient('Main Ingredient');
        $query = Ingredient::find($validId);

        $this->assertArrayHasKey('ingredient_name', $query);
    }

    public function test_return_ingredient_by_name() : void 
    {
        $validName = $this->createIngredient('Main Ingredient');
        $query = Ingredient::where('ingredient_name', 'TestName_Main Ingredient')->first();

        $this->assertArrayHasKey('ingredient_name', $query);
    }

    public function test_update_ingredient() : void
    {
        $validId = $this->createIngredient('Main Ingredient');
        $query = Ingredient::find($validId);
        $query->ingredient_name = 'TestName_Edited';
        $query->save();

        $this->assertEquals('TestName_Edited', $query->ingredient_name);
    }

    public function test_delete_ingredient() : void
    {
        $validId = $this->createIngredient('Main Ingredient');
        $query = Ingredient::find($validId);
        $query->delete();

        $this->assertNull(Ingredient::find($validId));
    }

}
