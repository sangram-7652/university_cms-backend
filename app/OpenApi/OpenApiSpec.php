<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\OpenApi]
#[OA\Info(
    version: '1.0.0',
    title: 'University CMS API',
    description: 'University CMS API Documentation'
)]
#[OA\Server(
    url: 'http://127.0.0.1:8000',
    description: 'Local Server'
)]
class OpenApiSpec
{
}