<?php

namespace App\Repositories;

use PDO;
use App\Core\DB;
use App\Models\Recipe;

class RecipeRepository
{
    public function find(int $id)
    {
        $request
            = DB::prepare('SELECT id, title, content, TO_CHAR(creation_date, \'dd/mm/yyyy à HH24:MI:SS\') as creation_date FROM recipes WHERE id = :id');
        $request->bindValue(':id', $id, PDO::PARAM_INT);
        $request->execute();

        return $request->fetchObject(Recipe::class);
    }

    public function findLast5()
    {
        $request = DB::query('SELECT id, title, content, TO_CHAR(creation_date, \'dd/mm/yyyy à HH24:MI:SS\') as creation_date FROM recipes ORDER BY creation_date LIMIT 5 OFFSET 0');

        return $request->fetchAll(PDO::FETCH_CLASS, Recipe::class);
    }
    public function findAll()
    {
        $request = DB::query('SELECT id, title, content, TO_CHAR(creation_date, \'dd/mm/yyyy à HH24:MI:SS\') as creation_date FROM recipes ORDER BY creation_date OFFSET 0');

        return $request->fetchAll(PDO::FETCH_CLASS, Recipe::class);
    }
}
