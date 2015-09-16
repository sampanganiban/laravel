<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Staff;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        // Create some data
        $title    = 'About page';
        $metaDesc = 'Learn more about us';

        $allStaff = Staff::all();

        return view('about.index', compact('title', 'metaDesc', 'allStaff'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Return a view
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        // If it fails then it will take you back to the form
        $this->validate($request, [
            'first_name'=>'required|min:2|max:20',
            'last_name'=>'required|min:2|max:30'
        ]);

        // Validation passed!

        // // LONG WAY OF ADDING A NEW STAFF MEMBER
        // // Staff() represents the staff model which represents table in the database
        // $staff = new Staff();

        // // Grab the info from the form
        // $staff->first_name = $request->first_name;
        // $staff->last_name  = $request->last_name;
        // // $staff->age        = $request->age;

        // // Add to the database
        // $staff->save();

        // SHORT WAY OF ADDING A NEW STAFF MEMBER

        // Insert a slug into the request
        // str_slug turns whatever comes back from the request to lowercase and add hyphens
        $request['slug'] = str_slug( $request->first_name.' '.$request->last_name );

        $staffMember = Staff::create($request->all());

        // Takes user back to the about page
        return redirect('about/'.$staffMember->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        // See if we can find information about the staff member
        // findOrFail is a function that is built into any model and it will find the id when you capture it between the brackets
        $staffMember = Staff::where('slug', $slug)->firstOrFail();

        // return $staffMember;

        // Compact is similar to doing 'staffMember=>$staffMember'
        return view('about.show', compact('staffMember'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($slug)
    {
        $staffMember = Staff::where('slug', $slug)->firstOrFail();

        return view('about.edit', compact('staffMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
