<?php
namespace Allugator\V1\Rest\Authentication;

class AuthenticationEntity
{
    public $id;
    public $login;
    public $senha;

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'senha' => $this->senha,
        ];
    }

    public function exchangeArray(array $array)
    {
        $this->id = $array['id'];
        $this->login = $array['login'];
        $this->senha = $array['senha'];
    }
}
