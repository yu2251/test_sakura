<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user)
    {
      Auth::user()->followings()->attach($user->id);
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       // ターゲットユーザのデータ
      $user = User::find($id);
      // ターゲットユーザのフォロワー一覧
      $followers = $user->followers;
      // ターゲットユーザのフォローしている人一覧
      $followings  = $user->followings;
    
      return response()->view('user.show', compact('user', 'followers', 'followings'));
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
    public function destroy(User $user)
    {
      Auth::user()->followings()->detach($user->id);
      return redirect()->back();
    }
}
