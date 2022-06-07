<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Auth;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    public function index(): JsonResponse
    {
        $notifications = Notification::select(['created_at', 'content'])->where('user_id', Auth::user())->latest()->take(5)->get();

        return Response()->Json($notifications);
    }
}
