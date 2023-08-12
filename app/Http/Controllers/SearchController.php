<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\User;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      $keyword = trim($request->keyword);
      $users  = User::where('name', 'like', "%{$keyword}%")->pluck('id')->all();
      $tweets = Tweet::query()
        ->where('tweet', 'like', "%{$keyword}%")
        ->orWhere('description', 'like', "%{$keyword}%")
        ->orWhereIn('user_id', $users)
        ->get();
        return response()->view('tweet.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return response()->view('search.input');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
