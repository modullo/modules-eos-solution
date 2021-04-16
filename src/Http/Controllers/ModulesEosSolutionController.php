<?php

namespace Modullo\ModulesEosSolution\Http\Controllers;

use App\Http\Controllers\Hub\HubController;
use Illuminate\Http\Request;

class ModulesEosSolutionController extends \App\Http\Controllers\Controller
{
    public $data;
    public function __construct() {
        $this->data = [
            'company_logo' =>  config('modules-eos-solution.company_logo'),
        ];
    }

    public function index(){
        $company_logo = $this->data['company_logo'];
        return view('modules-eos-solution::home',compact('company_logo'));
    }

    public function showProject(){
        return view('modules-eos-solution::dev.projects.show',$this->data);
    }

    public function admin(){
        return view('modules-eos-solution::admin',$this->data);
    }

}