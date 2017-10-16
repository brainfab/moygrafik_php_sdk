<?php

namespace Brainfab\MoyGrafik;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

/**
 * Class HttpClient
 *
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
    /**
     * @var string
     */
    private $host = 'https://www.moygrafik.ru';

    /**
     * @var Client
     */
    private $client;

    /**
     * HttpClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->host,
            'debug'    => false
        ]);

        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        \Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            __DIR__.'/../vendor/jms/serializer/src'
        );
    }

    /**
     * @param string $path
     * @param array  $params
     *
     * @return string
     */
    public function url($path = '', array $params = [])
    {
        if (substr($path, 0, 1) === '/') {
            $path = substr($path, 1);
        }
        foreach ($params as $paramKey => $paramValue) {
            $pathVar = '{'.$paramKey.'}';
            if (strpos($path, $pathVar) !== false) {
                $path = str_replace($pathVar, $paramValue, $path);
                unset($params[$paramKey]);
            }
        }

        if (count($params)) {
            $path .= '?'.http_build_query($params);
        }

        return '/'.$path;
    }

    /**
     * @param ResponseInterface $response
     * @param string            $type
     *
     * @return mixed
     */
    public function decodeResponse(ResponseInterface $response, $type)
    {
        return $this->serializer->deserialize($response->getBody()->getContents(), $type, 'json');
    }

    /**
     * @param array|object $data
     *
     * @return string
     */
    public function encodeRequestData($data)
    {
        return $this->serializer->serialize($data, 'json');
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($name, array $arguments = [])
    {
        if (method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        } else {
            return call_user_func_array([$this->client, $name], $arguments);
        }
    }
}
