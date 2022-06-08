<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->withSuccess('User has been deleted successfully');
    }
}
