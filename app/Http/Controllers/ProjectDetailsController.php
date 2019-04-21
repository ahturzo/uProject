<?php

namespace App\Http\Controllers;
use App\ProjectDetail;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectDetailsController extends Controller
{
    public function createProject()
    {
    	return view('allViews.addProject');
    }

    public function storeProject(Request $request)
    {
    	$project = ProjectDetail::create([
    		'user_id' => Auth::user()->id,
    		'project_title' => $request->input('pTitle'),
    		'project_detail' => $request->input('pDescription'),
    	]);

    	if($project)
        {
            return back()->with('success','<div class="text-center">You create your project successfully... Wait for Admin approval...</div>');
        }
        else
        {
            return back()->with('errors','<div class="text-center">Error creating the project...</div>');
        }
    }

    public function notAcceptyet()
    {
        $userProject = DB::table('users')
                        ->join('project_details', 'users.id', '=', 'project_details.user_id')
                        ->select('users.first_name', 'users.last_name', 'users.email', 'users.phone', 'project_details.*')
                        ->where('work_status', 'not_done')
                        ->get();
        return view('allViews.approveProject',['stat' => $userProject]);        
    	//$project_stat = ProjectDetail::where('work_status','not_done')->get();
        //return view('allViews.approveProject',['stat' => $$project_stat]);
    }

    public function acceptProject(Request $request)
    {
    	//echo $request->input('status')."<br>".$request->input('project_id');
    	if($request->input('status') == 'accept')
    	{
            $due = $request->input('price') - $request->input('advanced');

            if ($due < 0) 
            {
                return back()->with('success','<div class="text-center" style="color:red;">Invalid advanced amount...</div>');
            }
            else
            {
                $statusUpdate = ProjectDetail::where('id',$request->input('project_id'))->update(['accept_status' => 'Accepted', 'price' => $request->input('price'), 'advanced' => $request->input('advanced'), 'due' => $due]);
                return back()->with('success','<div class="text-center">Project accepted by Admin...</div>');
            }
    	}
    	elseif($request->input('status') == 'reject')
    	{
    		$statusUpdate = ProjectDetail::where('id',$request->input('project_id'))->update(['accept_status' => 'Rejected', 'work_status' => 'Done']);
    		return back()->with('success','<div class="text-center">Project rejected by Admin...</div>');
    	}
        elseif($request->input('status') == 'done')
        {
            $statusUpdate = ProjectDetail::where('id',$request->input('project_id'))->update(['work_status' => 'Done', 'due' => 0]);
            return back()->with('success','<div class="text-center">Congratulation!!! You have completed the project...</div>');
        }
    }

    public function projectStatus()
    {
        $project_status = ProjectDetail::where('user_id',Auth::user()->id)->get();
        return view('allViews.project_status',['status' => $project_status]);
    }

}
