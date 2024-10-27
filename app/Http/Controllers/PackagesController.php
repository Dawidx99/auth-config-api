<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackagesRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePackagesRequest;
use App\Models\Packages;

class PackagesController extends Controller
{
    public function index()
    {
        return Packages::all();
    }

    public function store(StorePackagesRequest $request)
    {
        $package = Packages::create($request->all());


        return [ 'package' => $package ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Packages $packages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackagesRequest $request, Packages $packages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Packages $packages)
    {
        //
    }
}
