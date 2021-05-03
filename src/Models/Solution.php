<?php

namespace Modullo\ModulesEosSolution\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modullo\ModulesEosSolution\Traits\UsesUuid;

class Solution extends Model
{
    use UsesUuid;
    protected $guarded = [];

    public function developer()
    {
        return User::where('uuid',$this->developer_id)->first();
    }
}