<?php

namespace App\Models;

class Model
{
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
    public function last(){
        
    }
}
