<?php

namespace Allugator\V1\Rest\Produtos;

use \Zend\Db\TableGateway\TableGateway;

class ProdutosMapper
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetch($id)
    {
        $id = (int) $id;
        $rowSet = $this->tableGateway->select(['id' => $id]);
        $row = $rowSet->current();

        if( ! $row) {
            throw new \Exception("Produto de id:{$id} não encontrado");
        }

        return $row;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function save(ProdutosEntity $produto)
    {
        $data = [
            'owner' => $produto->owner,
            'nome' => $produto->nome,
            'preco' => $produto->preco,
            'foto' => $produto->foto,
            'criado_em' => $produto->criado_em
        ];

        $id = (int) $produto->id;

        if ($id == 0) {
            $res = $this->tableGateway->insert($data);
            $produto->id = $this->tableGateway->lastInsertValue;
            return $produto;
        } else {
            if($this->fetch($id)) {
                $this->tableGateway->update($data, ['id' => $id]);
                return $produto;
            }
        }
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(['id' => (int) $id]);
    }
}