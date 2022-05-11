<?php

declare(strict_types=1);

namespace App\Servers\Contracts;

use App\Http\Requests\IncomingRequest;
use Illuminate\Http\JsonResponse;

interface ServerContract
{
    public function handle(IncomingRequest $request): JsonResponse;
}
