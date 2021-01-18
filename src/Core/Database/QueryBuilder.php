<?php

namespace App\Core\Database;

// Recipe::select(['column1', 'column2'])
//  ->where('column', '=', 'value')
//  ->orderBy(['creation_date' => 'ASC'])
//  ->max(5, 10)
//  ->get();

class QueryBuilder
{
    private static ?self $_instance = null;

    private array $columns = ['*'];
    private array $whereConditions = [];
    private array $orderByColumns;
    private int $limit;
    private int $offset;

    public function __construct(
        private Model $model,
    ) {
    }

    public static function getInstance(string $model): self
    {
        if (self::$_instance === null) {
            self::$_instance = new self(new $model());
        }

        return self::$_instance;
    }

    public function select(array $columns = ['*']): self
    {
        $this->columns = $columns;

        return $this;
    }

    public function where(
        string $column,
        string $comparator,
        mixed $value,
        string $chain = null
    ): self {
        // [
        //      [
        //          'query' => 'id = :id',
        //          'column' => 'id',
        //          'value' => 1,
        //          'chain' => 'AND' / 'OR'
        //      ],
        // ]
        $whereCondition = [
            'query'  => sprintf('%s %s :%1$s', $column, $comparator),
            'column' => $column,
            'value'  => $value,
        ];
        if ($chain !== null) {
            $whereCondition['chain'] = $chain;
        }

        $this->whereConditions[] = $whereCondition;

        return $this;
    }

    public function andWhere(
        string $column,
        string $comparator,
        mixed $value
    ) {
        $this->where($column, $comparator, $value, 'AND');
    }

    public function orWhere(
        string $column,
        string $comparator,
        mixed $value
    ) {
        $this->where($column, $comparator, $value, 'OR');
    }

    public function orderBy(array $columns): self
    {
        $this->orderByColumns = $columns;

        return $this;
    }

    public function max(int $limit, int $offset = 0): self
    {
        $this->limit = $limit;
        $this->offset = $offset;

        return $this;
    }

    private function buildSelect(): \PDOStatement
    {
        $select = 'SELECT '.implode(', ', $this->columns);
        $from = 'FROM '.$this->model->getTable();
        $whereString = '';
        $params = [];
        foreach ($this->whereConditions as $whereCondition) {
            if (isset($whereCondition['chain'])) {
                $whereString .= $whereCondition['chain'].' ';
            }
            $whereString .= 'WHERE '.$whereCondition['query'];
            $params = [$whereCondition['column'] => $whereCondition['value']];
        }

        if (isset($this->orderByColumns)) {
            $orderBy = ' ORDER BY '.implode(
                    ', ',
                    array_map(
                        function ($value, $key) {
                            return $key.' '.$value;
                        },
                        $this->orderByColumns,
                        array_keys($this->orderByColumns)
                    )
                );
        }

        // $query = $select.' '.$from.' '.$whereString;
        $query = sprintf('%s %s %s', $select, $from, $whereString);
        if (isset($orderBy)) {
            $query .= $orderBy;
        }
        if (isset($this->limit)) {
            // %d fait référence à un entier
            // contrairement à %s qui fait référence à une string
            // En MySQL: LIMIT %d, %d
            $query .= sprintf(' LIMIT %d OFFSET %d', $this->limit, $this->offset);
        }

        return $this->executeQuery($query, $params);
    }

    private function buildInsert(Model $model): bool
    {
        // INSERT INTO table (column1, column2) VALUES ('column1', 'column2')
        $insert = 'INSERT INTO '.$this->model->getTable();
        $fillables = $this->model->getFillable();
        $schema = ' ('.implode(', ', $fillables).')';
        $attributes = [];
        array_walk($fillables,
            function ($attribute) use (&$attributes, $model) {
                $attributes[$attribute] = $model->$attribute;
            });
        $values = ' VALUES (:'.implode(', :', $fillables).')';

        $query = $insert.$schema.$values;

        $request = $this->executeQuery($query, $attributes);

        return $request->rowCount() === 1;
    }

    private function executeQuery(string $query, array $params): \PDOStatement
    {
        $request = DB::prepare($query);
        foreach ($params as $column => $value) {
            $request->bindValue(':'.$column, $value);
        }
        $request->execute();

        return $request;
    }

    public function get(): array
    {
        $request = $this->buildSelect();

        return $request->fetchAll(\PDO::FETCH_CLASS, $this->model::class);
    }

    public function first(): Model
    {
        $request = $this->buildSelect();

        return $request->fetchObject($this->model::class);
    }

    public function saveModel(Model $model): bool
    {
        return $this->buildInsert($model);
    }
}
