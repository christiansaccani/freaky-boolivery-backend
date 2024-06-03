<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {

        $query = Restaurant::with('types');

        if ($request->has('types')) {
            $types = $request->input('types');
            $typesArray = explode(',', $types);

            $query->whereHas('types', function ($query) use ($typesArray) {
                $query->whereIn('type', $typesArray);
            })

                ->whereHas('types', function ($query) use ($typesArray) {
                    $query->whereIn('type', $typesArray);
                }, '=', count($typesArray));
        }

        $restaurants = $query->paginate(4);
        return response()->json([
            'success' => true,
            'results' => $restaurants,
        ]);
    }

    public function show($id)
    {
        $restaurants = Restaurant::with(['dishes' => function ($query) {
            $query->where('visible', true);
        }, 'types'])->find($id);

        if (!$restaurants) {
            return response()->json([
                'success' => false,
                'message' => 'Restaurant not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'results' => $restaurants,
        ]);
    }
}
