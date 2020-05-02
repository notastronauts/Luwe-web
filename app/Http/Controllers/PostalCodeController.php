<?php

namespace App\Http\Controllers;

use App\PostalCode;
use App\SubDistrict;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function show(PostalCode $postalCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function edit(PostalCode $postalCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostalCode $postalCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostalCode $postalCode)
    {
        //
    }

    public function getPostalCode(Request $request)
    {
        $search = $request->search;
        $postal = SubDistrict::where('sub_district_id', $search)->with('postal_code')->firstOrFail();

        return response()->json($postal->postal_code);
    }
}
