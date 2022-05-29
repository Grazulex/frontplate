<?php

namespace App\Http\Controllers;

use App\Enums\TypeEnums;
use App\Models\Plate;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function index(Request $request): view
    {
        $search = $request->get('search', '');

        $plates = Plate::search($search)
            ->latest()
            ->with('production')
            ->paginate(10);

        $types=array_column(TypeEnums::cases(), 'name');

        return view('pages.plates.index', compact('plates', 'search', 'types'));
    }

    public function show(Plate $plate): View
    {
        return view('pages.plates.show', compact('plate'));
    }

    public function destroy(Plate $plate): RedirectResponse
    {
        $plate->delete();

        return redirect()
            ->route('plates.index')
            ->withSuccess('Plates has been deleted successfully');

    }
}
