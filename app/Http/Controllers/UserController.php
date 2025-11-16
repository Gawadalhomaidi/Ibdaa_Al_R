<?php

namespace App\Http\Controllers;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\User;
use App\Enums\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::whereIn('name', ['administrator', 'editor'])->get();

        return view('users.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['nullable', 'string', 'max:20'],
            'date_of_birth' => ['nullable', 'date'],
            'gender' => ['nullable', 'string', 'in:male,female,other'],
            'status' => ['required', 'string', 'in:active,inactive,suspended'],
            'role' => ['required', 'string', 'exists:roles,name'],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,avif', 'max:4096'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'] ?? null,
            'date_of_birth' => $validated['date_of_birth'] ?? null,
            'gender' => $validated['gender'] ?? null,
            'status' => $validated['status'],
            'email_verified_at' => now(),
        ]);

        $user->assignRole($validated['role']);

        if ($request->hasFile('profile_image')) {
            $user->addMediaFromRequest('profile_image')
                ->usingFileName(time() . '_' . $request->file('profile_image')->getClientOriginalName())
                ->toMediaCollection('profile_images');
            $user->profile_image = $user->getFirstMediaUrl('profile_images', 'preview1') ?: null;
            $user->save();
        }

        return redirect()->route('users.index')
            ->with('success', __('erp.user_created_successfully'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::whereIn('name', ['administrator', 'editor'])->get();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'phone' => ['nullable', 'string', 'max:20'],
            'date_of_birth' => ['nullable', 'date'],
            'gender' => ['nullable', 'string', 'in:male,female,other'],
            'status' => ['required', 'string', 'in:active,inactive,suspended'],
            'role' => ['required', 'string', 'exists:roles,name'],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,avif', 'max:4096'],
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $role = $validated['role'];
        unset($validated['role']);

        $user->update($validated);

        $user->syncRoles([$role]);

        if ($request->hasFile('profile_image')) {
            $user->clearMediaCollection('profile_images');

            $user->addMediaFromRequest('profile_image')
                ->usingFileName(time() . '_' . $request->file('profile_image')->getClientOriginalName())
                ->toMediaCollection('profile_images');

            $user->profile_image = $user->getFirstMediaUrl('profile_images', 'preview1') ?: null;
            $user->save();
        }

        return redirect()->route('users.index')
            ->with('success', __('erp.user_updated_successfully'));
    }

    
    public function destroy(User $user)
    {
        if ($user->id === auth()->user->id()) {
            return redirect()->route('users.index')
                ->with('error', __('erp.cannot_delete_self'));
        }
        $user->clearMediaCollection('profile_images');

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', __('erp.user_deleted_successfully'));
    }
}
