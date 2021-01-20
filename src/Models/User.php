<?php

namespace App\Models;

use App\Core\Database\Model;

class User extends Model
{
    private int $id;
    private string $username;
    private string $passeword;
    protected array $fillable = ['username', 'passeword'];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPasseword(): string
    {
        return $this->passeword;
    }

    public function setPasseword(string $passeword): void
    {
        $this->passeword = $passeword;
    }

}