<?php

namespace Modullo\ModulesEosSolution\Models;

use Illuminate\Database\Eloquent\Model;
use Modullo\ModulesEosSolution\Traits\UsesUuid;

class SolutionSubmission extends Model
{
    use UsesUuid;
    protected $guarded = [];

    public function solution_developer()
    {
        return $this->belongsTo(SolutionDeveloper::class);
    }
}