<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Projects;
use App\Userstories;

class UserstoriesController extends Controller
{
    public function Userstories_page($project_id) {
        $project = Projects::find($project_id);
        $userstories = Userstories::where('project_id', '=', $project_id)->get();

        return view('pages.userstories', [
            'project' => $project,
            'userstories' => $userstories,
            "current_project" => $project->id
        ]);
    }

    public function edited(Request $request) {
        $userstory = Userstories::find($request->userstory_id);
        $userstory->description = $request->userstory_description;
        $userstory->acceptance_criteria = $request->userstory_ac;
        $userstory->save();
    }

    public function added(Request $request) {
        $userstory = new Userstories;
        $userstory->description = $request->add_userstory_description;
        $userstory->acceptance_criteria = $request->add_userstory_ac;
        $userstory->project_id = $request->add_project_id;
        $userstory->save();
    }

    public function deleted(Request $request) {
        Userstories::find($request->userstory_id)->delete();
    }
}
