<?php

namespace Modullo\ModulesEosSolution\Models;

use Illuminate\Database\Eloquent\Model;
use Modullo\ModulesEosSolution\Traits\UsesUuid;

class SolutionCycle extends Model
{
    use UsesUuid;
    protected $guarded = [];
}