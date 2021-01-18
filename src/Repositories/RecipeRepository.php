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
        return Recipe::last(5);
    }

    public function create(Recipe $recipe): bool
    {
        $request = DB::prepare('INSERT INTO recipes (title, content) VALUES (:title, :content)');
        $request->bindValue(':title', $recipe->getTitle());
        $request->bindValue(':content', $recipe->getContent());
        return $request->execute();
        return $recipe->save();
    }
}
