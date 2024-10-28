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
        $package = Packages::create($request->validated());

        return response()->json(['package' => $package], 201);
    }

    public function show(Packages $package)
    {
        return response()->json(['package' => $package], 200);
    }

    public function update(UpdatePackagesRequest $request, Packages $package)
    {
        $package->update($request->validated());

        return response()->json(['package' => $package], 200);
    }

    public function destroy(Packages $package)
    {
        $package->delete();

        return response()->json(['message' => 'Package deleted successfully'], 204);
    }
}
