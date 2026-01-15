<?php
declare(strict_types=1);

/**
 * (c) 2025 MayMeow. All rights reserved.
 *
 * NOTICE: This file is subject to the terms of the "LICENSE-COMMERCIAL" file
 * found in the root directory of this distribution.
 * Unlike the rest of this project, this specific file is NOT open source.
 * It is governed by the Proprietary License linked above.
 *
 * UNAUTHORIZED COPYING, MODIFICATION, OR BYPASSING OF THIS CODE IS STRICTLY PROHIBITED.
 */
namespace App\Middleware;

use App\Service\LicenseService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * License middleware
 */
class LicenseMiddleware implements MiddlewareInterface
{
    /**
     * Constructor
     *
     * @param \App\Service\LicenseService $licenseService License service
     */
    public function __construct(protected LicenseService $licenseService)
    {
    }

    /**
     * Process method.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request.
     * @param \Psr\Http\Server\RequestHandlerInterface $handler The request handler.
     * @return \Psr\Http\Message\ResponseInterface A response.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $request = $request->withAttribute('hasValidLicense', $this->licenseService->isValid());

        return $handler->handle($request);
    }
}
