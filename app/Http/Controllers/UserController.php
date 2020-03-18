<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('users.create', compact('cities'));
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
        $user = User::create($data);
        $user->cities()->sync($data['cities']);
        return redirect()->route('users.index')
            ->with('success', 'Der Benutzer wurde angelegt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $cities = City::all();
        return view('users.edit', compact('user', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $this->validateRequest($request);
        $user->update($data);
        $user->cities()->sync($data['cities']);
        return redirect()->route('users.index')
            ->with('success', 'Der Benutzer wurde mit geänderten Angaben gespeichert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function changePassword() {
        return view('users.changePassword');
    }

    public function storePassword(Request $request) {
        $data = $request->validate([
            'old' => 'required',
            'new' => 'confirmed|different:old',
        ]);

        if (!Hash::check($request->get('old'), Auth::user()->password)) {
            abort(403);
        }

        Auth::user()->update(['password' => Hash::make($data['new'])]);
        return redirect()->route('home');
    }

    protected function validateRequest(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'nullable|string',
            'cities' => 'nullable',
            'cities.*' => 'exists:cities,id',
        ]);
        if (isset($data['password'])) $data['password'] = Hash::make($data['password']);
        if (!isset($data['cities'])) $data['cities'] = [];
        return $data;
    }
}
