<?php

namespace App\Http\Controllers;

use App\StateAndProvince;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateAndProvinceController extends Controller
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
     * @param  \App\StateAndProvince  $stateAndProvince
     * @return \Illuminate\Http\Response
     */
    public function show(StateAndProvince $stateAndProvince)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StateAndProvince  $stateAndProvince
     * @return \Illuminate\Http\Response
     */
    public function edit(StateAndProvince $stateAndProvince)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StateAndProvince  $stateAndProvince
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StateAndProvince $stateAndProvince)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StateAndProvince  $stateAndProvince
     * @return \Illuminate\Http\Response
     */
    public function destroy(StateAndProvince $stateAndProvince)
    {
        //
    }

    public function ProvinceAutoComplete(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $provinces = StateAndProvince::orderby('province_name', 'asc')->select('province_id', 'province_name')->limit(5)->get();
        } else {
            $provinces = StateAndProvince::orderby('province_name', 'asc')->select('province_id', 'province_name')->where('province_name', 'like', '%' . $search . '%')->limit(10)->get();
        }

        $response = array();

        foreach ($provinces as $province) {
            $response[] = array("value" => $province->province_id, "label" => $province->province_name);
        }

        echo json_encode($response);
        exit;
    }
}
