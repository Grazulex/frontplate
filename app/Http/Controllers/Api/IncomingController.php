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
    public function getAmountCod(Request $request)
    {
        $plates = Plate::where('incoming_id', $request->get('id'))
        ->where('is_cod', 1)
        ->where('is_rush', 0)
        ->sum('amount');

        return Response()->Json($plates);
    }

    public function getAmountRush(Request $request)
    {
        $plates = Plate::where('incoming_id', $request->get('id'))
        ->where('is_rush', 1)
        ->sum('amount');

        return Response()->Json($plates);
    }

    public function getCod(Request $request)
    {
        $plates = Plate::select(['id', 'reference', 'amount'])
            ->where('incoming_id', $request->get('id'))
            ->where('is_cod', 1)
            ->where('is_rush', 0)
            ->get();

        return Response()->Json($plates);
    }
    public function getNonCod(Request $request)
    {
        $plates = Plate::select(['id', 'reference', 'amount'])
            ->where('incoming_id', $request->get('id'))
            ->where('is_cod', 0)
            ->where('is_rush', 0)
            ->get();

        return Response()->Json($plates);
    }

    public function getRush(Request $request)
    {
        $plates = Plate::select(['id', 'reference', 'amount'])
            ->where('incoming_id', $request->get('id'))
            ->where('is_rush', 1)
            ->get();

        return Response()->Json($plates);
    }
}
