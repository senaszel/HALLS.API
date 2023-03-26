<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexAdvertisementRequest;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\IndexAdvertisementResource;
use App\Http\Resources\KeywordsResource;
use App\Models\Advertisement;
use App\Models\Keyword;

class AdvertisementController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/advertisements",
     *     operationId="AdvertisementController@index",
     *     @OA\Response(response="200", description="Display a listing of advertisements.")
     * )
     */
    public function index(IndexAdvertisementRequest $request)
    {
        return IndexAdvertisementResource::collection(
            $request->filter()->paginate()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdvertisementRequest $request)
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/api/advertisements/{advertisement}",
     *     operationId="AdvertisementController@show",
     *     @OA\Parameter(
     *         name="advertisement",
     *         description="ID of advertisement to retrieve",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Display the specified advertisement.",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Advertisement not found.",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 example="Advertisement not found."
     *             )
     *         )
     *     )
     * )
     */
    public function show(Advertisement $advertisement)
    {
        return AdvertisementResource::make($advertisement);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdvertisementRequest $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }

    public function keywords()
    {
        return KeywordsResource::collection(Keyword::all());
    }

    public function img(Advertisement $advertisement)
    {
        if ($advertisement->img_path) {
            $asset = asset($advertisement->img_path);
            return '<img src="' . $asset . '">';
        }
        return "brak zdjęcia";
    }
}
