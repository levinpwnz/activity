<?php

use App\Http\Requests\IncomingRequest;
use App\Servers\Contracts\ServerContract;
use Illuminate\Support\Facades\Route;

Route::post('handle', function (IncomingRequest $request, ServerContract $server) {
    return $server->handle($request);
});
