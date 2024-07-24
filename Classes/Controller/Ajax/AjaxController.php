<?php

namespace Passionweb\BackendModule\Controller\Ajax;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Http\Response;

class AjaxController
{
    public function sampleAction(ServerRequestInterface $request): ResponseInterface
    {
        $parameters = $request->getParsedBody();
        $response = new Response();
        $response->getBody()->write(
            json_encode(
                [
                    'output' => 'I am a sample response. You send the following parameters: ' . json_encode($parameters),
                ]
            )
        );
        return $response;
    }
}
