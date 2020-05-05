<?php
namespace Allugator\V1\Rest\Produtos;

class ProdutosEntity
{
    public $id;
    public $owner;
    public $nome;
    public $preco;
    public $foto;
    public $criado_em;
    public $alterado_em;

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'owner' => $this->owner,
            'nome' => $this->nome,
            'preco' => $this->preco,
            'foto' => $this->foto,
            'criado_em' => $this->criado_em,
            'alterado_em' => $this->alterado_em,
        ];
    }

    public function exchangeArray(array $array)
    {
        $this->id = $array['id'];
        $this->owner = $array['owner'];
        $this->nome = $array['nome'];
        $this->preco = $array['preco'];
        $this->foto = $array['foto'];
        $this->criado_em = $array['criado_em'];
        $this->alterado_em = $array['alterado_em'];
    }
}
