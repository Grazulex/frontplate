<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class NotificationController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');

        $notifications = Notification::search($search)
            ->latest()
            ->paginate(25);

        return view('pages.notifications.index', compact('notifications', 'search'));
    }

    public function destroyAll(): RedirectResponse
    {
        Notification::where('user_id', Auth()->user()->id)->delete();

        return redirect()
            ->route('notifications.index')
            ->withSuccess('All notifications have been deleted successfully');
    }

    public function destroy(Notification $notification): RedirectResponse
    {
        $notification->delete();

        return redirect()
            ->route('notifications.index')
            ->withSuccess('Notification has been deleted successfully');
    }
}
