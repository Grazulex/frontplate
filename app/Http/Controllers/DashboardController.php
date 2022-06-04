<?php

namespace App\Http\Controllers;

use App\Enums\TypeEnums;
use App\Models\Plate;
use App\Services\HolidayService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {

        $platesWaiting = Plate::whereNull('production_id')->whereIn('type', TypeEnums::cases())->count();
        $platesproducted7days = Plate::with('production')
            ->whereHas('production', function ($query) {
                $query->where('created_at','>',Carbon::now()->subDays(7));
            })
            ->whereNotNull('production_id')
            ->whereIn('type', TypeEnums::cases())
            ->count();
        $platesproducted1days = Plate::with('production')
            ->whereHas('production', function ($query) {
                $query->where('created_at','>',Carbon::now()->subDays(1));
            })
            ->whereNotNull('production_id')
            ->whereIn('type', TypeEnums::cases())
            ->count();   
            
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(60);   
        $holidays = HolidayService::get(); 
        $period = CarbonPeriod::create($startDate, $endDate);
        $nextHoliday=null;
        foreach ($period as $dt) {
            if ($holidays->isHoliday($dt->format("m"), $dt->format("d"))) {
                $nextHoliday = $dt->format("d-m");
                break;
            }
        }

        return view('pages.index', compact('platesWaiting', 'platesproducted7days', 'platesproducted1days', 'nextHoliday'));
    }
}
