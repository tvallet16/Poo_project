<?php

namespace App\Core\Database;

class Model
{
    protected string $table;

    protected array $fillable = [];

    public function getTable(): string
    {
        if (isset($this->table)) {
            return $this->table;
        }

        return $this->guessTable();
    }

    private function guessTable(): string
    {
        $callingClass = static::class;
        // 'App\Models\Recipe'
        $callingClass = explode('\\', $callingClass);
        // ['App', 'Models', 'Recipe']
        $callingClass = array_pop($callingClass);

        // Recipe

        return strtolower($callingClass).'s'; // recipes
    }

    public function getFillable(): array
    {
        return $this->fillable;
    }

    public function __set(string $name, mixed $value): void
    {
        // $name === 'creation_date'
        $setter = ucwords($name, '_');
        // $setter === 'Creation_Date'
        $setter = str_replace('_', '', $setter);
        // $setter === 'CreationDate'
        $setter = 'set'.$setter;
        // $setter === 'setCreationDate'
        if (method_exists($this, $setter)) {
            // call_user_func([$this, $setter], $value);
            $this->$setter($value);
        }
    }

    public function __get(string $name): mixed
    {
        // $name === 'creation_date'
        $getter = ucwords($name, '_');
        // $setter === 'Creation_Date'
        $getter = str_replace('_', '', $getter);
        // $setter === 'CreationDate'
        $getter = 'get'.$getter;
        // $setter === 'getCreationDate'
        if (method_exists($this, $getter)) {
            // call_user_func([$this, $getter], $value);
            return $this->$getter();
        }

        return null;
    }

    public static function all(): array
    {
        return static::get();
    }

    public static function find(int $id)
    {
        return static::select(['title', 'content', 'creation_date'])
            ->where('id', '=', $id)->first();
    }

    public static function last(int $amount, int $from = 0)
    {
        // Comme je veux tout récupérer, je ne précise pas de select
        return static::orderBy(['creation_date' => 'DESC'])->max($amount, $from)
            ->get();
    }

    public function save()
    {
        return static::saveModel($this);
    }

    public static function __callStatic(string $name, array $arguments)
    {
        return QueryBuilder::getInstance(static::class)->$name(...$arguments);
    }
}
