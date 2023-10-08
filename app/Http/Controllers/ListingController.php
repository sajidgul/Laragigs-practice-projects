<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.home', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->Paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formField = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);



        if ($request->hasFile('logo')) {
            $formField['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formField['user_id'] = auth()->id();

        Listing::create($formField);
        return redirect(route('index'))->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        if ($listing) {
            return view('app.show', [
                'listing' => $listing
            ]);
        } else {
            abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = DB::table('listings')->find($id);
        return view('app.edit', ['listing'=>$listing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Listing $listing, Request $request)
    {
        // it will confirm that the user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'unauthorized Action');
        }
        $formField = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);


        if ($request->hasFile('logo')) {
            $formField['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formField);
        return redirect(route('manage'))->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // MOVE TO TRASH
    public function destroy(Listing $listing)
    {
        if($listing->user_id != auth()->id()){
            abort(403, 'unauthorized Action');
        }
            $listing->delete();
            return redirect(route('manage'))->with('success', 'Listing deleted Successfully');
    }
    
    public function manage(){
        return view('app.manage', ['listings'=>auth()->user()->listings()->get()]);
    }

    public function manage_trash(){
        $listing = auth()->user()->listings()->onlyTrashed()->get();
        return view('app.manage_trash', ['listings'=>$listing]);
    }
    public function manage_restore($id){
        $listing = Listing::withTrashed()->find($id);
        if(!is_null($listing)){
            $listing->restore();
        }
        return redirect(route('manage_trash'));
    }

    public function manage_force_delete($id){
        $listing = Listing::withTrashed()->find($id);
        if(!is_null($listing)){
            $listing->forceDelete();
        }
        return redirect(route('manage_trash'));
    }
}
