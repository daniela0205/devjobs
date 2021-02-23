<?php

namespace App\Http\Controllers;

use App\Position;
use App\Applicant;
use Illuminate\Http\Request;
use App\Notifications\NewApplicat;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //Have the actual ID

          $id_position = $request->route('id');

        // Have the applicants and position
        $position = Position::findOrFail( $id_position );

        //Policy
        $this->authorize('view',$position);

        return view('applicants.index', compact('position'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
           'cv'=>'required|mimes:pdf|max:1000',
            'position_id'=>'required',
        ]);

        //Save file pdf
        if($request->file('cv')){
            $file = $request->file('cv');
            $nameFile = time().".".$request->file('cv')->extension();
            $location = public_path('/storage/cv');
            $file->move($location, $nameFile);


        }

        $position = Position::find($data['position_id']);

        $position->applicants()->create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'cv'=>$nameFile
        ]);

        $recruiter =$position->recruiter;
        $recruiter->notify(new NewApplicat($position->title, $position->id));

        return back()->with('state','Your information was sent correctly. Good Luck!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
