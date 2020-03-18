<?php

namespace App\Http\Controllers;

use App\City;
use App\Helper;
use App\HelpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpRequestController extends Controller
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

        $helpRequests = HelpRequest::whereIn('city_id', Auth::user()->cityIds())->orderBy('created_at', 'desc')->get();
        return view('helpRequests.index', compact('helpRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $helpers = Helper::whereIn('city_id', Auth::user()->cities);
        return view('helpRequests.create', compact('cities', 'helpers'));
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
        $helpRequest = HelpRequest::create($data);
        $helpRequest->geocode();
        $helpRequest->helpers()->sync($data['helpers']);
        if (Auth::user()) {
            return redirect()->route('helpRequests.edit', $helpRequest)
                ->with('success', 'Die neue Anfrage wurde angelegt.');
        } else {
            return redirect()->route('thanks', City::find($helpRequest->city_id));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HelpRequest  $helpRequest
     * @return \Illuminate\Http\Response
     */
    public function show(HelpRequest $helpRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HelpRequest  $helpRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpRequest $helpRequest)
    {
        // if no handler is assigned yet, assign me
        // (this is done before editing so the record will be locked to the user immediately)
        if (null === $helpRequest->user) {
            $helpRequest->update(['user_id' => Auth::user()->id]);
        }

        $cities = City::all();
        $helpers = Helper::whereHas('cities', function($query) use ($helpRequest) { $query->where('cities.id', $helpRequest->city_id); })->get();
        return view('helpRequests.edit', compact('helpRequest', 'cities', 'helpers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HelpRequest  $helpRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HelpRequest $helpRequest)
    {
        $data = $this->validateRequest($request);
        $helpRequest->update($data);
        $helpRequest->helpers()->sync($data['helpers']);
        $geo = $helpRequest->geocode();
        return redirect()->route('helpRequests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HelpRequest  $helpRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(HelpRequest $helpRequest)
    {
        $helpRequest->delete();
        return redirect()->route('helpRequests.index')
            ->with('success', 'Die Anfrage wurde gelöscht.');
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
            'request' => 'nullable|string',
            'notes' => 'nullable|string',
            'done' => 'nullable|int',
            'city_id' => 'required|int|exists:cities,id',
            'helpers' => 'nullable',
            'helpers.*' => 'exists:helpers,id',
        ]);
        if (!isset($data['helpers'])) $data['helpers'] = [];
        return $data;
    }
}
