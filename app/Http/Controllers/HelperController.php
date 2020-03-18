<?php

namespace App\Http\Controllers;

use App\City;
use App\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelperController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cityIds = Auth::user()->cityIds();
        $helpers = Helper::whereHas('cities', function ($query) use ($cityIds) { $query->whereIn('cities.id', $cityIds); })->get();
        return view('helpers.index', compact('helpers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('helpers.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest($request);
        $helper = Helper::create($data);
        $helper->geocode();
        $helper->cities()->sync($data['cities']);
        if (Auth::user()) {
            return redirect()->route('helpers.index')
                ->with('success', 'Der/die neue Helfer*in wurde angelegt.');
        } else {
            if (null === $helper->cities->first()) return redirect()->route('welcome');
            return redirect()->route('thanks', $helper->cities->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function show(Helper $helper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function edit(Helper $helper)
    {
        $cities = City::all();
        return view('helpers.edit', compact('helper', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Helper $helper)
    {
        $data = $this->validateRequest($request);
        $helper->update($data);
        $helper->geocode();
        $helper->cities()->sync($data['cities']);
        return redirect()->route('helpers.index')
            ->with('success', 'Der/die neue Helfer*in wurde mit geänderten Angaben gespeichert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helper $helper)
    {
        $helper->delete();
        return redirect()->route('helpers.index');
    }

    protected function validateRequest(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'zip' => 'required|string',
            'city' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|string',
            'threema' => 'nullable|string',
            'notes' => 'nullable|string',
            'cities' => 'nullable',
            'cities.*' => 'exists:cities,id',
            'city_id' => 'nullable|int|exists:cities,id',
        ]);
        if (!isset($data['cities'])) {
            if (isset($data['city_id'])) $data['cities'] = [$data['city_id']];
            else $data['cities'] = [];
        }
        return $data;
    }
}
