<?php

namespace App;

class Router 
{
    private static $handlers;
    private $request;
    private $response;
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';
    private const METHOD_DELETE = 'DELETE';
    private const METHOD_PUT = 'PUT';

    public function __construct(Request $request, Response $response)
    {
      $this->request = $request;
      $this->response = $response;
    }

    public static function get($path, $handler)
    {
      self::addHandler(self::METHOD_GET, $path, $handler);
    }

    public static function post($path, $handler)
    {
      self::addHandler(self::METHOD_POST, $path, $handler);
    }

    public static function delete($path, $handler)
    {
      self::addHandler(self::METHOD_DELETE, $path, $handler);
    }

    public static function put($path, $handler)
    {
      self::addHandler(self::METHOD_PUT, $path, $handler);
    }

    private static function addHandler(string $method, string $path, $handler)
    {
      self::$handlers[$method . $path] = [
        'path' => $path,
        'method' => $method,
        'handler' => $handler
      ];
    }

    public function resolve()
    {
      $requestPath = $this->request->getPath();
      $method = $_POST['_method'] ?? $this->request->method();
      $callback = null;

      foreach(self::$handlers as $handler)
      {
        if($handler['path'] === $requestPath && $method === $handler['method'])
        {
          $callback = $handler['handler'];
        }
      }

      if(!$callback)
      {
        $this->response->setStatusCode(404);
        return view('404');
      }

      return call_user_func($callback);
    }

}