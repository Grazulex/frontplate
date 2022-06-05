<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Services\ProductionService;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProductionController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');

        $productions = Production::search($search)
            ->latest()
            ->withCount('plates')
            ->paginate(10);


        return view('pages.productions.index', compact('productions', 'search'));
    }


    public function show(Production $production): View
    {
        return view('pages.productions.show', compact('production'));
    }

    public function print(Production $production): StreamedResponse
    {
        $filename = 'prod_'.$production->id.'.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $productionService = new ProductionService($production);
        $productionService->makeCsv();

        $callback = function () use ($filename) {
            readfile($filename);
        };

        return response()->stream($callback, 200, $headers);
    }
}
