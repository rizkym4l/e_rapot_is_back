<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        if ($request->file('image')) {
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }

            $path = $request->file('image')->store('profile_images', 'public');
            $user->photo = $path;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile image updated successfully.');
    }
}
