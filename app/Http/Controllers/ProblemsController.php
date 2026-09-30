<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProblemsRequest;
use App\Mail\ProblemCreatedMail;
use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProblemsController extends Controller
{
    public function getListProblems(){
        $listProblems = Problem::active()->paginate(20);

        return view('test', ['problems' => $listProblems]);
    }

    public function addProblem(ProblemsRequest $request)
    {
        $imageName = null;

        if($image = $request->image){
            $fileName = $image->getClientOriginalName();
            $fileName = explode('.',$fileName)[0];
            $imageName = Str::slug($fileName).'-'.time().'.'.$image->getClientOriginalExtension();

            Storage::disk('local')->put('public/images/'.$imageName, file_get_contents($image));
        }

        $token = Str::random(60);

        $problem = Problem::create([
            'email' => $request->email,
            'name' => $request->name ?? null,
            'display_name' => $request->display_name ?? null,
            'description' => $request->description ?? null,
            'type' => $request->type,
            'status' => 'pending',
            'address' => $request->address,
            'image_url' => $imageName ?? null,
            'verification_token' => $token,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        $url = url()->to('/').'/confirmProblem/'.$token;

        // Send email to user
        Mail::to($request->email)->send(new ProblemCreatedMail($url));

        return back()->with(['success' => 'Problem stored successfully.']);
    }

    public function confirmProblem($token)
    {
        $problem = Problem::where('verification_token', $token)->first();

        if($problem) {
            $problem->status = 'in-review';
            $problem->verification_token = null;
            $problem->save();

            return view('pages.thank-you');
        }

        return redirect(route('map.get'));
    }
}
