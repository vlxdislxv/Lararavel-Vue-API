<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceRequest;
use App\Place;
use Illuminate\Http\Request;
use function foo\func;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return mixed[]
     */
    public function index(Request $request)
    {
        return Place::searchPlaces($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlaceRequest  $request
     * @return Place
     */
    public function store(PlaceRequest $request)
    {
        return Place::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Place
     */
    public function show($id)
    {
        return Place::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlaceRequest $request
     * @param  int  $id
     * @return Place
     */
    public function update(PlaceRequest $request, $id)
    {
        $place = Place::findOrFail($id);
        $place->update($request->all());

        return $place;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy($id)
    {
        $place = Place::findOrFail($id);
        $place->delete();
        return '';
    }
}
