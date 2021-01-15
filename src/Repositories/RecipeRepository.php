<?php

namespace App\Repositories;

use PDO;
use App\Core\Database\DB;
use App\Models\Recipe;

class RecipeRepository
{
    /**
     * @return Recipe[]
     */
    public function findAll(): array
    {
        return Recipe::all();
    }

    public function find(int $id): Recipe
    {
        return Recipe::find($id);
    }

    /**
     * @return Recipe[]
     */
    public function findLast5(): array
    {
        $request = DB::query('SELECT id, title, content, TO_CHAR(creation_date, \'dd/mm/yyyy à HH24:MI:SS\') as creation_date FROM recipes ORDER BY creation_date DESC LIMIT 5 OFFSET 0');

        return $request->fetchAll(PDO::FETCH_CLASS, Recipe::class);
    }

    public function create(Recipe $recipe): bool
    {
        return $recipe->save();
    }
}
