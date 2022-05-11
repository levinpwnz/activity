<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class DefaultController
{
    public function __invoke(string $message)
    {
        info('DefaultController', [$message]);
    }
}
