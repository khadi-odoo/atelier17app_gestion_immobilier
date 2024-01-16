<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
// use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Admin\PropertyFormRequest;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{

    private function extractDataWithImage(PropertyFormRequest $request, Property $property ): array 
    {
        // La je traite les données qui sont envoyé par le navigateur
        $data = $request -> validated();
        $image = $request ->validated('image');
        //dd($image);
        if($image === null || $image ->getError() ){
            return $data;
        }
        //la je traite les données de l'instance du model
        if($property -> image ){
            Storage::disk('public')->delete($property -> image);
        }
        $data['image'] = $image -> store('propertyImg', 'public');
        // dd($data);
        return $data;

    }


    /**
     * Display a listing of the resource.
     */
    public function index() 
    {    
        return view('admin.properties.index', [
            'properties' =>Property::orderBy('created_at', 'desc')->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([ 'title' => 'Villa', 'price' => '3790000', 'surface' => 40, 'rooms' =>3, 'bedrooms' =>1, 'description' => 'Magnifique  au bord de la plage', 'floor' => 0, 'city' =>'Dakar', 'address' => 'Mermoz comico', 'postal_code' =>'23444', 'sold' => false ]); 
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request, Property $property	)
    {     
      
        $property = Property::create( $this -> extractDataWithImage($request,  $property ));
        $property ->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été crée');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {  
        // dd($property->id);
        return view('admin.properties.form', ['property' => $property, 'options' =>Option::pluck('name', 'id') ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update( PropertyFormRequest $request,  Property $property,) 
    {
        // /** @var UploadFile | null $image */
        $property ->update($this -> extractDataWithImage( $request,  $property ) );
        $property ->options()->sync($request->validated('options')); 
        return to_route('admin.property.index')->with('success', 'Le bien a bien été édité');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property )
    {
        if($property -> image ){
            Storage::disk('public')->delete($property -> image);
        }
        $property->delete( $property );
        return to_route('admin.property.index')->with('success', 'Le bien a bien été supprimé');     
    }

   
}
