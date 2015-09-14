<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $staff    = [
                        ['name' => 'One', 'age'   => 34], 
                        ['name' => 'Two', 'age'   => 17], 
                        ['name' => 'Three']
                    ];

        $comments = [
                        ['heading' => 'Great Product', 'comment'  => 'I love this product!'],
                        ['heading' => 'Hello', 'comment' => 'Text']
                    ];

        return view('about.index')->with([
            'title'    => $title,
            'metaDesc' => $metaDesc,
            'staff'    => $staff,
            'comments' => $comments
        ]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
