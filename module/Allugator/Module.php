<?php
namespace Allugator;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Db\ResultSet\ResultSet;
use Allugator\V1\Rest\Produtos\ProdutosEntity;
use Zend\Db\TableGateway\TableGateway;
use Allugator\V1\Rest\Produtos\ProdutosMapper;
use Allugator\V1\Rest\Authentication\AuthenticationEntity;
use Allugator\V1\Rest\Authentication\AuthenticationMapper;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'AllugatorProdutosTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('DB\Produto');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ProdutosEntity);
                    return new TableGateway('produtos', $dbAdapter, null, $resultSetPrototype);
                },
                'Allugator\V1\Rest\Produtos\ProdutosMapper' => function($sm) {
                    $tableGateway = $sm->get('AllugatorProdutosTableGateway');
                    return new ProdutosMapper($tableGateway);
                },
                'AllugatorAuthenticationTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('DB\Produto');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new AuthenticationEntity);
                    return new TableGateway('usuarios', $dbAdapter, null, $resultSetPrototype);
                },
                'Allugator\V1\Rest\Authentication\AuthenticationMapper' => function($sm) {
                    $tableGateway = $sm->get('AllugatorAuthenticationTableGateway');
                    return new AuthenticationMapper($tableGateway);
                }
            ]
        ];
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
