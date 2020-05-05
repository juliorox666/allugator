<?php

namespace Allugator\V1\Rest\Authentication;

use \Zend\Db\TableGateway\TableGateway;

class AuthenticationMapper
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function login($data)
    {
        $rowSet = $this->tableGateway->select($data);
        $row = $rowSet->current();

        if( ! $row) {
            throw new \Exception("Usuário não encontrado.");
        }

        $row->senha = "{SHA}". base64_encode(sha1($data['senha'], TRUE));
        
        return $row;
    }
}