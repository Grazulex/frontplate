<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Incoming;
use App\Models\Notification;
use App\Models\Plate;
use Auth;
use Illuminate\Http\JsonResponse;

class IncomingController extends Controller
{
    public function getCod(Incoming $incoming)
    {
        $plates = Plate::select(['id', 'reference', 'amount'])
            ->where('incoming_id', $incoming->id)
            ->where('is_cod', 1)
            ->where('is_rush', 0)->get();

        return Response()->Json($plates);
    }
}
