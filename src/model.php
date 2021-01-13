<?php

function connectToBDD(): PDO
{
    try {
        return new PDO('pgsql:host=postgres;dbname=postgres',
            'postgres', 'secret');
    } catch (Exception $e) {
        die('Error: '.$e->getMessage());
    }
}

function getLast5Recipes(): bool|PDOStatement
{
    // SELECT title, content, DATE_FORMAT(creation_date, \'%d/%c/%Y à %H:%i:%s\') FROM recipes ORDER BY creation_date DESC LIMIT 0,5;
    return connectToBDD()->query('SELECT title, content, TO_CHAR(creation_date, \'dd/mm/yyyy à HH24:MI:SS\') as creation_date FROM recipes ORDER BY creation_date DESC LIMIT 5 OFFSET 0;');
}

function getRecipe(int $id)
{
    // SELECT title, content, DATE_FORMAT(creation_date, \'%d/%c/%Y à %H:%i:%s\') FROM recipes WHERE id = :id;
    $request
        = connectToBDD()->prepare('SELECT title, content, TO_CHAR(creation_date, \'dd/mm/yyyy à HH24:MI:SS\') as creation_date FROM recipes WHERE id = :id');
    $request->bindValue(':id', $id, PDO::PARAM_INT);
    $request->execute();

    return $request->fetch(PDO::FETCH_ASSOC);
}
