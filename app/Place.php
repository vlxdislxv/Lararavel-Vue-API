<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'];

    public static function searchPlaces(Request $request)
    {
        return static::query()
            ->when($request->input('name'), function ($query, $val) {
                return $query->where('name', 'LIKE', '%'.$val.'%');
            })
            ->when($request->input('bedrooms'), function ($query, $val) {
                return $query->where('bedrooms', '=', $val);
            })
            ->when($request->input('bathrooms'), function ($query, $val) {
                return $query->where('bathrooms', '=', $val);
            })
            ->when($request->input('storeys'), function ($query, $val) {
                return $query->where('storeys', '=', $val);
            })
            ->when($request->input('garages'), function ($query, $val) {
                return $query->where('garages', '=', $val);
            })
            ->when($request->input('price_from'), function ($query, $val) {
                return $query->where('price', '>=', $val);
            })
            ->when($request->input('price_to'), function ($query, $val) {
                return $query->where('price', '<=', $val);
            })
            ->get();
    }
}
