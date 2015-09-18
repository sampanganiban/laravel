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
            'last_name'=>'required|min:2|max:30',
            'age'=>'required|between:0,130|integer',
            'profile_image'=>'required|image|between:0,2000'
        ]);

        // // LONG WAY OF ADDING A NEW STAFF MEMBER
        // // Staff() represents the staff model which represents table in the database
        // $staff = new Staff();

        // // Grab the info from the form
        // $staff->first_name = $request->first_name;
        // $staff->last_name  = $request->last_name;
        // // $staff->age        = $request->age;

        // // Add to the database
        // $staff->save();

        // Profile image
        // getClientOriginalExtension grabs the original extension the user used for their image
        $fileExtension = $request->file('profile_image')->getClientOriginalExtension();
        
        // Generate a new profile image name to avoid duplication
        // Join the two together      ^ ^  
        $fileName = 'staff-'.uniqid().'.'.$fileExtension;
        //                             -
        $request->file('profile_image')->move('img/staff', $fileName);
        
        // Grabbed the profile image and resized it
        \Image::make('img/staff/'.$fileName)->resize(240, null, function($constrait) {
            
            $constrait->aspectRatio();

        })->save('img/staff/'.$fileName);

        // Extract the form data
        $input = $request->all();

        // Validation passed!

        // SHORT WAY OF ADDING A NEW STAFF MEMBER
        // Insert a slug into the request
        // str_slug turns whatever comes back from the request to lowercase and add hyphens
        $input['slug'] = str_slug( $request->first_name.' '.$request->last_name );
        $input['profile_image'] = $fileName;

        $staffMember = Staff::create($input);

        // Takes user back to staff member's profile page
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
    public function update(Request $request, $slug)
    {
        
        // Validation
        $this->validate($request, [
            'first_name'=>'required|min:2|max:20',
            'last_name'=>'required|min:2|max:30',
            'age'=>'required|between:0,130|integer',
            'profile_image'=>'image|between:0,2000'
        ]);

        // Find the user or staff member to edit where slug is equal to whatever came back from the form
        $staffMember = Staff::where('slug', $slug)->firstOrFail();

        // Makes changes to the database
        $staffMember->first_name    = $request->first_name;
        $staffMember->last_name     = $request->last_name;
        $staffMember->age           = $request->age;

        // Referencing the existing slug and assigning to it the new slug based on changes made to the staff members name
        $staffMember->slug = str_slug( $request->first_name.' '.$request->last_name );

        // If the user provided a new image then save that image
        if( $request->hasFile('profile_image') ) {

            // Change the image file name, move the image file and resize the image

            // Grab the file extension of the image
            $fileExtension = $request->file('profile_image')->getClientOriginalExtension();
            
            // Generate a new profile image name to avoid duplication and join the two together
            //                            ^ ^  
            $fileName = 'staff-'.uniqid().'.'.$fileExtension;
            //                             -
            $request->file('profile_image')->move('img/staff', $fileName);
            
            // Grabbed the profile image and resized it
            \Image::make('img/staff/'.$fileName)->resize(240, null, function($constrait) {    
                    $constrait->aspectRatio();
                })->save('img/staff/'.$fileName);
            
                // Delete the old image
                \File::Delete('img/staff/'.$staffMember->profile_image);

                // Tell the database of the new image
                $staffMember->profile_image = $fileName;
            }

            // Save the changes to the database
            $staffMember->save();

            // Redirect user to the staff members page with the updated changes
            return redirect('about/'.$staffMember->slug);

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








