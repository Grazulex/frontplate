<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Jobs\ProcessInsertNotification;
use App\Jobs\ProcessSendWelcomeEmail;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Str;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');

        $users = User::search($search)
            ->latest()
            ->paginate(10);

        return view('pages.users.index', compact('users', 'search'));
    }

    public function create(): View
    {
        return view('pages.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $user = User::create(array_merge($request->validated(), ['password'=>Hash::make(Str::random(10))]));
        ProcessInsertNotification::dispatch('Your new account is made. Welcome', [$user]);
        ProcessSendWelcomeEmail::dispatch($user);

        return redirect()
            ->route('users.index')
            ->withSuccess('User has been created successfully.');
    }

    public function edit(User $user): View
    {
        return view('pages.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());
        return redirect()
            ->route('users.index')
            ->withSuccess('User has been updated successfully.');
    }

    public function editPassword(User $user): View
    {
        return view('pages.users.edit-password', compact('user'));
    }

    public function updatePassword(Request $request, User $user):  RedirectResponse
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|same:confirm_password',
            'confirm_password' => 'required',
          ]);
        if (!\Hash::check($request->current_password, $user->password)) {
            return back()->withErrors('Current password does not match!');
        }
        $user->password = \Hash::make($request->new_password);
        $user->save();

        return redirect()
            ->route('users.index')
            ->withSuccess('User password has been updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->withSuccess('User has been deleted successfully');
    }
}
