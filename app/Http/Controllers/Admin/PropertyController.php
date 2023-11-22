<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Admin\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill(['title' => 'Villa', 'price' => '3790000', 'surface' => 40, 'rooms' => 3, 'bedrooms' => 1, 'description' => 'Magnifique  au bord de la plage', 'floor' => 0, 'city' => 'Dakar', 'address' => 'Mermoz comico', 'postal_code' => '23444', 'sold' => false]);
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $data = $request->validated();
        $image = $request->validated('image');
        if ($image !== null && !$image->getError()) {
            $data['image'] = $image->store('propertyImg', 'public');
        }

        $property = Property::create($data);
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été crée');
    }


    public function image(string $image, $dataWhereStore)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', ['property' => $property, 'options' => Option::pluck('name', 'id')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        // $image = $request->validated('image');
        /** @var UploadFile | null $image */
        $data = $request->validated();
        $image = $request->validated('image');
        if ($image !== null && !$image->getError()) {
            $data['image'] = $image->store('propertyImg', 'public');
        }

        $property->update($data);
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été édité');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Le bien a bien été supprimé');
    }
}
