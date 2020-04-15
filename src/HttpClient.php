<?php

namespace Brainfab\MoyGrafik;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;

/**
 * @method Client get(string|UriInterface $uri, array $options = [])
 * @method Client head(string|UriInterface $uri, array $options = [])
 * @method Client put(string|UriInterface $uri, array $options = [])
 * @method Client post(string|UriInterface $uri, array $options = [])
 * @method Client patch(string|UriInterface $uri, array $options = [])
 * @method Client delete(string|UriInterface $uri, array $options = [])
 * @method Client getAsync(string|UriInterface $uri, array $options = [])
 * @method Client headAsync(string|UriInterface $uri, array $options = [])
 * @method Client putAsync(string|UriInterface $uri, array $options = [])
 * @method Client postAsync(string|UriInterface $uri, array $options = [])
 * @method Client patchAsync(string|UriInterface $uri, array $options = [])
 * @method Client deleteAsync(string|UriInterface $uri, array $options = [])
 */
class HttpClient
{
    private const BASE_HOST = 'https://www.moygrafik.ru';

    private $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?? new Client(['base_uri' => self::BASE_HOST]);

        AnnotationRegistry::registerLoader('class_exists');
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function url(string $path, array $params = []): string
    {
        if (substr($path, 0, 1) === '/') {
            $path = substr($path, 1);
        }

        foreach ($params as $paramKey => $paramValue) {
            $pathVar = '{' . $paramKey . '}';
            if (strpos($path, $pathVar) !== false) {
                $path = str_replace($pathVar, $paramValue, $path);
                unset($params[$paramKey]);
            }
        }

        if (count($params)) {
            $path .= '?' . http_build_query($params);
        }

        return '/' . $path;
    }

    public function decodeResponse(ResponseInterface $response, string $type): object
    {
        return $this->serializer->deserialize($response->getBody()->getContents(), $type, 'json');
    }

    /**
     * @param array|object $data
     */
    public function encodeRequestData($data): string
    {
        return $this->serializer->serialize($data, 'json');
    }

    /**
     * @return mixed
     */
    public function __call(string $name, array $arguments = [])
    {
        if (method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        } else {
            return call_user_func_array([$this->client, $name], $arguments);
        }
    }
}
