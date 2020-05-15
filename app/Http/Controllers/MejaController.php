<?php

namespace App\Http\Controllers;

use App\Meja;
use App\Restaurant;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $restaurant = Restaurant::where('id', $id)->get()->first();
        return view('restaurants.sidebar.table_manager.table')->with('restaurant', $restaurant);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $restaurant = Restaurant::where('id', $id)->get()->first();
        return view('restaurants.sidebar.table_manager.create-table')->with('restaurant', $restaurant);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $restaurant = Restaurant::where('id', $request->id)->get()->first();
        $semua_meja = Meja::all();

        $validate = $request->validate([
            'id' => 'required',
            'nomor_meja' => 'required|numeric',
            'jumlah_kursi' => 'required|numeric'
        ]);


        foreach ($semua_meja as $key) {
            if ($key->nomor_meja == $validate['nomor_meja'] && $key->restaurant_id == $validate['id']) {
                $validate = $request->validate([
                    'id' => 'required',
                    'nomor_meja' => 'required|numeric|unique:mejas',
                    'jumlah_kursi' => 'required|numeric'
                ]);                
            }
        }

        $meja = new Meja;
        $meja->nomor_meja = $validate['nomor_meja'];
        $meja->jumlah_kursi = $validate['jumlah_kursi'];
        $restaurant->meja()->save($meja);
        $meja->restaurant()->associate($restaurant);

        return redirect( route('table-manager.index', $restaurant->id) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meja $meja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meja $meja)
    {
        //
    }
}
