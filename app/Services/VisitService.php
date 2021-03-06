<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Visit;
use Illuminate\Support\Carbon;

final class VisitService
{
    public function storeVisit(string $url, string $time): void
    {
        /**
         * @var Visit $visit
         */
        $visit = Visit::upsert([
            'url' => $url,
            'last_visit_at' => Carbon::parse($time)
        ],[
            'url' => $url
        ]);

        $visit->increment('views');
    }

    public function allVisits()
    {
        return Visit::latest('last_visit_at')
            ->get();
    }
}
