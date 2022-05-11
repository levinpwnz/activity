<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\VisitService;
use Illuminate\Support\Collection;

class VisitsController extends Controller
{
    public function __construct(private VisitService $service)
    {
    }

    public function handleVisit(string $url, string $time)
    {
        $this->service->storeVisit($url, $time);
    }

    public function showAllVisits(): Collection
    {
        return $this->service->allVisits();
    }
}
