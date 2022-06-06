<?php

namespace App\View\Components;

use App\Models\Notification;
use Auth;
use Illuminate\View\Component;

class Notifications extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $notifications = Notification::where('user_id', Auth::user())->latest()->get();

        return view('components.notifications', compact('notifications'));
    }
}
