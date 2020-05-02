<?php

namespace App\Http\Controllers;

use App\Address;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurants.sidebar.myrestaurants.restaurant');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.sidebar.myrestaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'restaurant_name' => 'required',
            'restaurant_description' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'sub_district_id' => 'required',
            'postal_id' => 'required'
        ]);
        $restaurant = Restaurant::create([
            'restaurant_name' => $validateData['restaurant_name'],
            'restaurant_description' => $validateData['restaurant_description'],
        ]);

        $address = new Address;
        $address->address = $validateData['address'];
        $address->sub_district_id = $validateData['sub_district_id'];
        $address->postal_id = $validateData['postal_id'];

        $address->restaurant()->associate($restaurant);
        $address->save();

        // $address = Address::create([
        //     'address' => $validateData['address'],
        //     'sub_district_id' => $validateData['sub_district_id'],
        //     'postal_id' => $validateData['postal_id']
        // ])->restaurant()->assign($restaurant);


        return redirect(route('myrestaurants.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
