<?php

declare(strict_types=1);

use App\Http\Requests\IncomingRequest;
use App\Servers\Contracts\ServerContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('handle', function (Request $request, ServerContract $server) {
    return response()->json(['data' => $request->toArray()]);
    $server->handle($request->get('method'), $request->get('params'));
});
