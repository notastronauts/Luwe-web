<?php

namespace App\Http\Controllers;

use App\Address;
use App\ImageModel;
use App\Restaurant;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{

    public $path;

    public function __construct()
    {
        $this->path = storage_path('app/public/images');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::get();
        return view('restaurants.sidebar.myrestaurants.restaurant')->with('restaurants', $restaurants);
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
            'postal_id' => 'required',
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $user = User::find(Auth::user()->id);

        // Check is directory exist
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        if (!File::isDirectory($this->path . '/' . $user->id)) {
            File::makeDirectory($this->path . '/' . $user->id);
        }
        if (!File::isDirectory($this->path . '/' . $user->id . '/restaurant')) {
            File::makeDirectory($this->path . '/' . $user->id . '/restaurant');
        }
        if (!File::isDirectory($this->path . '/' . $user->id . '/restaurant/thumbnail')) {
            File::makeDirectory($this->path . '/' . $user->id . '/restaurant/thumbnail');
        }

        $originalImage = $request->file('image');
        $thumbnailImage = Image::make($originalImage);

        $originalPath = $this->path . '/' . $user->id . '/restaurant/';
        $thumbnailPath = $this->path . '/' . $user->id . '/restaurant/thumbnail/';
        $name = Carbon::now()->timestamp . '-' . uniqid() . '-' . $originalImage->getClientOriginalName();
        $thumbnailImage->save($originalPath . $name);
        $thumbnailImage->resize(500, 500);
        $thumbnailImage->save($thumbnailPath . $name);

        $restaurant = new Restaurant;
        $restaurant->restaurant_name = $validateData['restaurant_name'];
        $restaurant->restaurant_description = $validateData['restaurant_description'];
        $restaurant->user()->associate($user);
        $restaurant->save();

        $imageModel = new ImageModel;
        $imageModel->name = $name;
        $imageModel->save();
        $restaurant->images()->attach($imageModel);

        $address = new Address;
        $address->address = $validateData['address'];
        $address->sub_district_id = $validateData['sub_district_id'];
        $address->postal_id = $validateData['postal_id'];
        $address->restaurant()->associate($restaurant);
        // $address->sub_district()->associate($sub_district);
        // $address->postal_code()->associate($postal_code);
        $address->save();

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
    public function edit($myrestaurant)
    {
        $restaurant = Restaurant::find($myrestaurant);
        return view('restaurants.sidebar.myrestaurants.edit')->with('restaurant', $restaurant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $restaurant)
    {
        $user = User::find(Auth::user()->id);
        $data = Restaurant::where('id', $restaurant)->first();
        $validateData = $request->validate([
            'restaurant_name' => 'required',
            'restaurant_description' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'sub_district_id' => 'required',
            'postal_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if (!empty($request->image)) {
            Storage::delete($this->path . '/' . $user->id . '/restaurant/' . $data->images->first()->name);
            Storage::delete($this->path . '/' . $user->id . '/restaurant/thumbnail/' . $data->images->first()->name);
            $originalImage = $request->file('image');
            $thumbnailImage = Image::make($originalImage);
            $originalPath = $this->path . '/' . $user->id . '/restaurant/';
            $thumbnailPath = $this->path . '/' . $user->id . '/restaurant/thumbnail/';
            $name = Carbon::now()->timestamp . '-' . uniqid() . '-' . $originalImage->getClientOriginalName();
            $thumbnailImage->save($originalPath . $name);
            $thumbnailImage->resize(500, 500);
            $thumbnailImage->save($thumbnailPath . $name);
            $data->images->first()->name = $name;
            $data->images->first()->save();
        }

        $data->restaurant_name = $validateData['restaurant_name'];
        $data->restaurant_description = $validateData['restaurant_description'];
        $data->address->address = $validateData['address'];
        $data->address->sub_district_id = $validateData['sub_district_id'];
        $data->address->postal_id = $validateData['postal_id'];
        $data->address->save();
        $data->save();

        return redirect(route('myrestaurants.index'));

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
