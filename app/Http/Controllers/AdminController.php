<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProblemsStatusRequest;
use App\Mail\ProblemStatusChangedMail;
use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function getDashboard(Request $request)
    {
        $problems = Problem::active();

        if($request->filter){
            $problems->where('status', $request->filter);
        }

        $problems = $problems->orderBy($request->orderBy ?? 'created_at', 'DESC')->paginate(20);

        return view('pages.admin.dashboard', ['problems' => $problems, 'filter' => $request->filter, 'orderBy' => $request->orderBy]);
    }

    public function setProblemStatus(ProblemsStatusRequest $request) {
        $count = 1;

        if(!$request->problems) {
            return back()->withErrors(['problem' => 'Morate da izaberete najmanje 1 problem da biste dovršili ovu radnju.']);
        }

        if($request->status === 'merged' && count($request->problems) < 2) {
            return back()->withErrors(['problem' => 'Morate izabrati više od jednog problema da biste napravili spajanje.']);
        }

        $mergedProblem = null;

        foreach($request->problems as $problemId) {
            $problem = Problem::find($problemId);

            // if status is merged
            if($request->status === 'merged') {
                if($count < 2) {
                    $mergedProblem = $this->createNewProblemFromOld($problem);

                    $count++;
                }

                $problem->parent_id = $mergedProblem->id;
            } else {
                // if status is accepted or closed
                $problem->status = $request->status;
            }
            $problem->save();

            Mail::to($problem->email)->send(new ProblemStatusChangedMail($request->status));
        }

        return back();
    }

    public function deleteProblems(Request $request)
    {
        if(!$request->problems) {
            return back()->withErrors(['problem' => 'Morate da izaberete najmanje 1 problem da biste dovršili ovu radnju.']);
        }

        foreach($request->problems as $problemId) {
            Problem::find((int)$problemId)->delete();
        }

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect(route('admin.login.get'));
    }

    protected function createNewProblemFromOld($problem) {
        return Problem::create([
            'email' => $problem->email,
            'name' => $problem->name,
            'display_name' => $problem->display_name,
            'description' => $problem->description,
            'address' => $problem->address,
            'type' => $problem->type,
            'status' => 'merged',
            'lat' => $problem->lat,
            'lng' => $problem->lng,
            'image_url' => $problem->image_url,
        ]);
    }
}
