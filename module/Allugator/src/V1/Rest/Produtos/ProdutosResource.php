<?php
namespace Allugator\V1\Rest\Produtos;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ProdutosResource extends AbstractResourceListener
{
    protected $mapper;

    public function __construct($mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        //return new ApiProblem(405, 'The POST method has not been defined');
        $produtoEntity = new ProdutosEntity();
        $produtoEntity->nome = $data->nome;
        $produtoEntity->preco = $data->preco;
        $produtoEntity->foto = $data->foto;
        $produtoEntity->criado_em = date('Y-m-d H:i:s');

        return $this->mapper->save($produtoEntity);
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        //return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
        if($this->mapper->delete($id)) {
            return true;
        }
        return false;
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        //return new ApiProblem(405, 'The GET method has not been defined for individual resources');
        return $this->mapper->fetch($id);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        //return new ApiProblem(405, 'The GET method has not been defined for collections');
        return $this->mapper->fetchAll();
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        //return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
        $produtoEntity = new ProdutosEntity();
        $produtoEntity->id = $data->id;
        $produtoEntity->nome = $data->nome;
        $produtoEntity->preco = $data->preco;
        $produtoEntity->foto = $data->foto;
        $produtoEntity->alterado_em = date('Y-m-d H:i:s');

        return $this->mapper->save($produtoEntity);
    }
}
