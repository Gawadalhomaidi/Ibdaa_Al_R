<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Show the user's profile page.
     */
    public function show(Request $request): View
    {
        $user = $request->user();

        return view('profile', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Validation rules
        $data = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['nullable', 'string', 'max:255'],
            'email'      => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'phone'      => ['nullable', 'string', 'max:30'],
            'date_of_birth' => ['nullable', 'date'],
            'gender'     => ['nullable', 'in:male,female,other'],
            'profile_image' => ['nullable', 'image', 'max:5120'], // max 5MB
        ]);

        // If user changed email, reset verified timestamp
        if (isset($data['email']) && $data['email'] !== $user->email) {
            $user->email_verified_at = null;
        }

        // Normalize date_of_birth if provided
        if (!empty($data['date_of_birth'])) {
            try {
                $data['date_of_birth'] = Carbon::parse($data['date_of_birth'])->toDateString();
            } catch (\Exception $e) {
                // if parsing fails, remove it so save won't break
                unset($data['date_of_birth']);
            }
        }

        // Fill and save simple attributes
        $user->fill($data);
        $user->save();

        // Handle profile image upload via Spatie MediaLibrary
        if ($request->hasFile('profile_image')) {
            // remove previous avatar(s) from the collection if desired
            $user->clearMediaCollection('avatars');

            // add new uploaded image to 'avatars' collection
            $user->addMediaFromRequest('profile_image')->toMediaCollection('avatars');

            // Optional: update profile_image attribute with the URL or filename
            // (depends on how you use profile_image in your app; comment out if not needed)
            $user->profile_image = $user->getFirstMediaUrl('avatars') ?: null;
            $user->save();
        }

        return Redirect::route('profile.show')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account after confirming password.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate current password using the built-in rule
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Log the user out
        Auth::logout();

        // Optionally clear media (avatars)
        if (method_exists($user, 'clearMediaCollection')) {
            $user->clearMediaCollection('avatars');
        }

        // Delete the user record
        $user->delete();

        // Invalidate session & regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'account-deleted');
    }
}
