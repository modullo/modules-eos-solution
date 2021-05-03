<?php

namespace Modullo\ModulesEosSolution\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modullo\ModulesEosSolution\Traits\UsesUuid;

class SolutionDeveloper extends Model
{
    use UsesUuid;
    protected $guarded = [];

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }

    public function submission()
    {
        return $this->hasOne(SolutionSubmission::class);
    }


}