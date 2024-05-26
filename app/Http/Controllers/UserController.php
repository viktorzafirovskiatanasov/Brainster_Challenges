<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userData = session('user_data');

        if (!empty($userData)) {
            return view('users.index', compact('userData'));
        } else {
            return view('users.index')->with('userData', null);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $userData = [
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
        ];

        $request->session()->put('user_data', $userData);

        return redirect()->route('user.show')->with('success', 'User data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $userData = session('user_data');

        if (!empty($userData)) {
            return view('users.show', compact('userData'));
        } else {
            return view('users.show', compact('userData', null));
        }

    }

    public function logout()
    {
        session()->forget('user_data');

        return redirect()->route('user')->with('success', 'Logged out successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
