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
     * Display a listing of the resource.
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
     * Display the specified resource.
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
}
