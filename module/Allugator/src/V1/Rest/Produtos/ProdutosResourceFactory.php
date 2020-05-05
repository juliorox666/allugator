<?php
namespace Allugator\V1\Rest\Produtos;

class ProdutosResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Allugator\V1\Rest\Produtos\ProdutosMapper');
        return new ProdutosResource($mapper);
    }
}
