<?php

namespace Modullo\ModulesEosSolution\Models;

use Illuminate\Database\Eloquent\Model;
use Modullo\ModulesEosSolution\Traits\UsesUuid;

class SolutionCycle extends Model
{
    use UsesUuid;
    protected $guarded = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}