<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $appends = [
        'last_visit_for_humans'
    ];

    protected $casts = [
        'last_visit_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function getLastVisitForHumansAttribute()
    {
        return $this->last_visit_at->diffForHumans();
    }
}
