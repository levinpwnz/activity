<?php

declare(strict_types=1);

namespace App\Servers;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncomingRequest;
use App\Servers\Contracts\ServerContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class JsonRpcServer implements ServerContract
{
    private const CONTROLLER_NAMESPACE = 'App\\Http\\Controllers\\';

    public function handle(IncomingRequest $request): JsonResponse
    {
        $payload = $request->get('json');

        $controller = $this->makeController(Arr::get($payload, 'controller', 'DefaultController'));
        $method = Arr::get($payload, 'method', '__invoke');
        $params = Arr::get($payload, 'params', ['message' => '^_^']);

        $data = $controller->$method(...$params);

        return new JsonResponse($data);
    }

    private function makeController(string $controllerName): Controller
    {
        return app(self::CONTROLLER_NAMESPACE . $controllerName);
    }
}
