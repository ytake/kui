<?php
declare(strict_types=1);

namespace App\DataAccess;

use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\UriNormalizer;

trait UrlBuilderTrait
{
    /**
     * @param string $host
     * @param string $path
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getUri(string $host, string $path)
    {
        $uri = new Uri($host);
        $uri = $uri->withPath($path);

        return UriNormalizer::normalize(
            $uri,
            UriNormalizer::REMOVE_DUPLICATE_SLASHES
        );
    }
}
