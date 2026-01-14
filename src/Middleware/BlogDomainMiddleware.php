<?php
declare(strict_types=1);

namespace App\Middleware;

use Cake\ORM\TableRegistry;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * BlogDomain middleware
 */
class BlogDomainMiddleware implements MiddlewareInterface
{
    /**
     * Process method.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request.
     * @param \Psr\Http\Server\RequestHandlerInterface $handler The request handler.
     * @return \Psr\Http\Message\ResponseInterface A response.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $host = $request->getUri()->getHost();

        $domainTable = TableRegistry::getTableLocator()->get('Domains');
        $domain = $domainTable->find()
            ->where(['domain' => $host])
            ->contain(['Blogs'])
            ->first();

        if ($domain) {
            $request = $request->withAttribute('currentBlog', $domain->get('blog')->id);
        }

        return $handler->handle($request);
    }
}
