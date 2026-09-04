<?php

namespace App\Http\Controllers;

use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Menampilkan detail satu unit.
     */
    public function show(Unit $unit)
    {
        abort_unless(
            $unit->is_active && $unit->room->is_active,
            404
        );

        $unit->load([
            'room' => function ($query) {
                $query->with([
                    'units' => function ($unitQuery) {
                        $unitQuery
                            ->where('is_active', true)
                            ->orderBy('name');
                    },
                ]);
            },
        ]);

        return view('units.show', compact('unit'));
    }
}