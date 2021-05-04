<?php

namespace Modullo\ModulesEosSolution\Http\Controllers;

use App\Http\Controllers\Hub\HubController;
use Illuminate\Http\Request;
use Modullo\ModulesEosSolution\Mail\SolutionStatusMail;
use Modullo\ModulesEosSolution\Models\Solution;
use App\Models\User;
use Modullo\ModulesEosSolution\Models\SolutionCycle;
use Modullo\ModulesEosSolution\Models\SolutionDeveloper;
use Illuminate\Support\Facades\Auth;
use Modullo\ModulesEosSolution\Models\SolutionSubmission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

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
        $solutions = Solution::where('published',1)->get();
        return view('modules-eos-solution::home',compact('company_logo','solutions'));
    }

    public function submitSolution(Request $request){
        $input = $request->all();
        SolutionSubmission::create([
            'description' => $input['description'],
            'solution_developer_id' => $input['solution_developer_id'],
            'github_url' => $input['github_url'],
            'docker_url' => $input['docker_url'],
        ]);

        $solution = SolutionDeveloper::where('id',$input['solution_developer_id'])
            ->first();

        $solution->update([
            'stages' => 'submitted'
        ]);
        if($input['github_repo'] === 'private'){
            return back()->with(['message' => 'Your Solution has been received, please check your email for updates, please grant <b>ekoopensource</b> access to the repo']);
        }
        return back()->with(['message' => 'Your Solution has been received, please check your email for updates']);
    }

    public function profile(){
        $company_logo = $this->data['company_logo'];
        return view('modules-eos-solution::dev.profile',compact('company_logo'));
    }

    public function mySolution(){
        $company_logo = $this->data['company_logo'];
        $mySolutions = SolutionDeveloper::where('developer_id',Auth::user()->uuid)
            ->join('solutions','solutions.id','solution_developers.solution_id')
            ->paginate(10);
        return view('modules-eos-solution::dev.soln.my-solution',compact('company_logo','mySolutions'));
    }

    public function showProject($slug){
        $solution = Solution::where('slug',$slug)
            ->first();
        $submission = SolutionDeveloper::where('solution_id',$solution->id)
             ->where('developer_id',Auth::user()->uuid)
             ->first();
        return view('modules-eos-solution::dev.projects.show',$this->data)->with(['solution'=> $solution,'submission' => $submission]);
    }

    public function interest(Request $request){

        $input = $request->all();
        SolutionDeveloper::create([
            'solution_id' => $input['solution_id'],
            'developer_id' => $input['developer_id'],
        ]);
        return back()->with(['message' => 'Thank you for indicating interest, you may proceed to the next stage']);
    }

    public function admin(){
        $users = User::where('role','!=','admin')->paginate(10);
        return view('modules-eos-solution::admin',$this->data)->with(['users'=>$users]);
    }

    public function createSolution(){
        $cycles = SolutionCycle::all();
        return view('modules-eos-solution::admin.solutions.create',$this->data)->with(['cycles' => $cycles]);
    }

    public function editSolution($id){

        $cycles = SolutionCycle::all();
        $solution = Solution::findOrFail($id);
        return view('modules-eos-solution::admin.solutions.edit',$this->data)->with(['cycles' => $cycles,'solution' => $solution]);
    }

    public function createSolutionCycle(){
        return view('modules-eos-solution::admin.solutions.cycle',$this->data);
    }

    public function storeSolution(Request $request){
        $request->validate([
            'name' => 'required|unique:solutions',
            'description' => 'required',
            'what_you_need_to_build' => 'required',
            'solicitation_type' => 'required',
            'cover_image' => 'required',
            'frd_date' => 'required',
            'submission_deadline' => 'required',
            'solution_cycle_id' => 'required',
        ]);
        $input = $request->all();

        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            $disk = 's3';
            $ext = $file->getClientOriginalExtension();
            $path = 'cover-image'.time().'.'.$ext;

            $storage = Storage::disk($disk)->putFileAs('portal/images',$file,$path);
            $value = Storage::disk('s3')->url($storage);
            $input['cover_image'] = $value;
        }

        $input['slug'] = str_replace(' ','-', strtolower($input['name']));
        Solution::create([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'image_url' => $input['cover_image'],
            'description' => $input['description'],
            'frd_date' => $input['frd_date'],
            'what_you_need_to_build' => $input['what_you_need_to_build'],
            'solicitation_type' => $input['solicitation_type'],
            'submission_deadline' => $input['submission_deadline'],
            'solution_cycle_id' => $input['solution_cycle_id'],
        ]);
        return back()->with(['message' => 'Solution Successfully created']);
    }

    public function storeSolutionCycle(Request $request){

        $request->validate([
            'cycle_name' => 'required',
            'start_cycle' => 'required',
            'end_cycle' => 'required',
        ]);
        $input = $request->all();

        SolutionCycle::create([
            'name' => $input['cycle_name'],
            'start_date' => $input['start_cycle'],
            'end_date' => $input['end_cycle'],
        ]);
        return back()->with(['message' => 'Cycle Successfully created']);
    }

    public function solution(){
        $solutions = Solution::paginate(10);
        $cycles = SolutionCycle::all();
        return view('modules-eos-solution::admin.solutions.index',$this->data)->with(['solutions' => $solutions,'cycles' =>$cycles]);
    }

    public function submission(){
        $submissions = SolutionDeveloper::join('users','users.uuid','solution_developers.developer_id')
            ->join('solutions','solutions.id','solution_developers.solution_id')
            ->join('solution_submissions','solution_submissions.solution_developer_id','solution_developers.id')
            ->paginate(10);
        return view('modules-eos-solution::admin.solutions.submission',$this->data)->with(['submissions' => $submissions]);
    }

    public function updateSubmission(Request $request)
    {
        $request->validate([
           'message' => 'required'
        ]);
        $input = $request->all();
        $solution = SolutionDeveloper::where('solution_id',$input['solution_id'])
            ->where('developer_id',$input['developer_id'])
            ->first();
        $user = User::where('uuid',$input['developer_id'])->first();
        $message = $input['message'];

        Mail::to($user->email)
            ->send(new SolutionStatusMail($message,$user->first_name,$input['status']));

        $solution->update([
            'stages' => $input['status']
        ]);

        if($input['status'] === 'approved'){
            return back()->with(['approve' => 'Solution Approved']);
        } elseif ($input['status'] === 'rejected') {
            return back()->with(['reject' => 'Solution Rejected']);
        } else {
            return back()->with(['review' => 'Solution Reviewed']);
        }
    }

    public function updateSolution(Request $request)
    {
        $input = $request->all();
        $id = $input['id'];
        $solution = Solution::findOrFail($id);

        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            $disk = 's3';
            $ext = $file->getClientOriginalExtension();
            $path = 'cover-image'.time().'.'.$ext;

            $storage = Storage::disk($disk)->putFileAs('portal/images',$file,$path);
            $value = Storage::disk('s3')->url($storage);
            $input['cover_image'] = $value;
        }

        if($request->hasFile('frd')){
            $file = $request->file('frd');
            $disk = 's3';
            $ext = $file->getClientOriginalExtension();
            $path = 'FRD'.time().'.'.$ext;

            $storage = Storage::disk($disk)->putFileAs('portal/frds',$file,$path);
            $value = Storage::disk('s3')->url($storage);
            $input['frd'] = $value;
        }

        $solution->update($input);

        return back()->with(['message' => 'Solution Successfully updated']);
    }

    public function publishSolution(Request $request,$id)
    {
        $solution = Solution::findOrFail($id);

        $solution->update([
            'published' => $solution->published ? false : true,
        ]);

        if($solution->published){
            return back()->with(['message' => 'Solution Successfully published']);
        } else {
            return back()->with(['deactivate' => 'Solution Successfully deactivated']);
        }

    }

}