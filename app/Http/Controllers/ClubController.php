<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //initializing the Clubs array
        $clubs = Club::all();
        //rederizing Show and passing the clubs array 
        return Inertia::render('Clubs/Index', ['clubs'=>$clubs]);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //rederizing CreateForm
        return Inertia::render(('Clubs/Create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //asking for required fields
        $request->validate([ 
            'club_name' => 'required|max:100',
            'club_delegate' => 'required'
        ]);
        $club = new Club($request->input());
        $club->save();
        return redirect('clubs');
        //return Redirect::route('clubs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        return Inertia::render('Clubs/Edit', ['club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        $request->validate([ 
            'club_name' => 'required|max:100',
            'club_delegate' => 'required'
        ]);
        $club->update($request->all());
        return redirect('clubs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        $club->delete();
        return redirect('clubs');
    }
}
