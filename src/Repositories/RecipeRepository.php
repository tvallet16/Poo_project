<?php

namespace App\Repositories;

use PDO;
use App\Core\DB;
use App\Models\Recipe;

class RecipeRepository
{
    /**
     * @return Recipe[]
     */
    public function findAll(): array
    {
        $request = DB::query('SELECT id, title, content, TO_CHAR(creation_date, \'dd/mm/yyyy à HH24:MI:SS\') as creation_date FROM recipes');

        return $request->fetchAll(PDO::FETCH_CLASS, Recipe::class);
    }

    public function find(int $id): Recipe
    {
        $request
            = DB::prepare('SELECT id, title, content, TO_CHAR(creation_date, \'dd/mm/yyyy à HH24:MI:SS\') as creation_date FROM recipes WHERE id = :id');
        $request->bindValue(':id', $id, PDO::PARAM_INT);
        $request->execute();

        return $request->fetchObject(Recipe::class);
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
        $request = DB::prepare('INSERT INTO recipes (title, content) VALUES (:title, :content)');
        $request->bindValue(':title', $recipe->getTitle());
        $request->bindValue(':content', $recipe->getContent());

        return $request->execute();
    }
}
