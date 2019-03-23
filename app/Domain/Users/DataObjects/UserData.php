<?php

namespace App\Domain\Users\DataObjects;

use Illuminate\Http\Request;

final class UserData
{
    public $name;

    public $email;

    public $password;

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public static function fromRequest(Request $request): self
    {
        return (new self)
            ->setName($request->input('name'))
            ->setEmail($request->input('email'))
            ->setPassword($request->input('password'));
    }
}