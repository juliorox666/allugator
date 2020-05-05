<?php
namespace Allugator\V1\Rest\Authentication;

class AuthenticationResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Allugator\V1\Rest\Authentication\AuthenticationMapper');
        return new AuthenticationResource($mapper);
    }
}
