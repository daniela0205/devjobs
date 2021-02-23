<?php

namespace App\Http\Controllers;

use App\User;
use App\Salary;
use App\Category;
use App\Location;
use App\Position;
use App\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PositionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::where('user_id',auth()->user()->id)->latest()->simplePaginate(3);

        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // require
        $categories = Category::all();
        $experiences = Experience::all();
        $locations = Location::all();
        $salaries = Salary::all();
        return view('positions.create')
                    ->with('categories', $categories)
                    ->with('experiences', $experiences)
                    ->with('locations', $locations)
                    ->with('salaries', $salaries);
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
            'title'=>'required|min:8',
            'category'=>'required',
            'experience'=>'required',
            'location'=>'required',
            'salary'=>'required',
            'description'=>'required|min:20',
            'imagen'=>'required',
            'skills'=>'required',
        ]);

        auth()->user()->positions()->create([
            'title' => $data['title'],
            'imagen' => $data['imagen'],
            'description' => $data['description'],
            'skills' => $data['skills'],
            'category_id' => $data['category'],
            'experience_id' => $data['experience'],
            'location_id' => $data['location'],
            'salary_id' => $data['salary'],
        ]);

        return redirect()->action('PositionController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        return view('positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //Policy
        $this->authorize('view',$position);
       // require
       $categories = Category::all();
       $experiences = Experience::all();
       $locations = Location::all();
       $salaries = Salary::all();
       return view('positions.edit')
                   ->with('categories', $categories)
                   ->with('experiences', $experiences)
                   ->with('locations', $locations)
                   ->with('salaries', $salaries)
                   ->with('position',$position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //Policy
        $this->authorize('update',$position);

        $data = $request->validate([
            'title'=>'required|min:8',
            'category'=>'required',
            'experience'=>'required',
            'location'=>'required',
            'salary'=>'required',
            'description'=>'required|min:20',
            'imagen'=>'required',
            'skills'=>'required',
        ]);

            $position->title = $data['title'];
        // $position->imagen = $data['imagen'];
            $position->description = $data['description'];
            $position->skills = $data['skills'];
            $position->category_id = $data['category'];
            $position->experience_id = $data['experience'];
            $position->location_id = $data['location'];
            $position->salary_id = $data['salary'];

            $position->save();

            return redirect()->action('PositionController@index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //Policy
        $this->authorize('delete',$position);

        $position->delete();
        return response()->json(['message:'=>'Was deleted the position '.$position->title]);
    }



    public function imagen(Request $request)
    {

        $imagen = $request->file('file');
        $nameImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('storage/positions'), $nameImagen );
        return response()->json(['correct' => $nameImagen]);
    }

    public function deletimagen(Request $request)
    {
        if($request->ajax()) {
            $imagen = $request->get('imagen');

            if( File::exists( 'storage/positions/' . $imagen ) ) {
                File::delete( 'storage/positions/' . $imagen );
            }

        return response('Imagen Deleted', 200);
        }
    }

    public function state(Request $request, Position $position){

        $position->active = $request->state;
        $position->save();
        return response()->json($position);
    }

    public function search(Request $request){
        $data = $request->validate([
            'category'=>'required',
            'location' => 'required'
        ]);

        $category = $data['category'];
        $location = $data['location'];


        $positions = Position::latest()
            ->where('category_id', $category)
            ->where('location_id',$location)
            ->get();

        return view('search.index', compact('positions'));
    }


    public function results(){
        return "from resutl";
    }

}
