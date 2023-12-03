<?php

namespace App\Http\Controllers\Admin;

use App\Models\Picture;

use App\Models\Option;
use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PictureFormRequest;

use App\Models\BedRoom;
use App\Models\LivingRoom;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{

    private function extractDataWithImage(PictureFormRequest $request, Picture $picture ): array 
    {
        // La je traite les données qui sont envoyé par le navigateur
        $data = $request -> validated();
        $image = $request ->validated('image');
        //dd($image);
        if($image === null || $image ->getError() ){
            return $data;
        }
        //la je traite les données de l'instance du model
        if($picture -> image ){
            Storage::disk('public')->delete($picture -> image);
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
       //dd(BedRoom::with('Property'));
        return view('admin.pictures.index', [
            'properties' =>Property::orderBy('created_at', 'desc')->paginate(9)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Property $property)
    {
        $picture = new Picture();
        return view('admin.pictures.form', [
            'picture' => $picture,
            'property' => $property
         
            //'property' => $property, 'options' =>Option::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PictureFormRequest $request, Picture $picture)
    {
        $picture = Picture::create($this -> extractDataWithImage($request,  $picture ));
        return to_route('admin.picture.index')->with('success', 'L\'picture a bien été crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {  
        dd($property->id);
        return view('admin.pictures.form', ['property' => $property, 'options' =>Option::pluck('name', 'id') ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PictureFormRequest $request, Picture $picture)
    {
        $picture ->update($this -> extractDataWithImage( $request,  $picture ) );
        return to_route('admin.picture.index')->with('success', 'L\'picture a bien été édité');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture )
    {
        $picture->delete();
        return to_route('admin.picture.index')->with('success', 'L\'picture a bien été supprimé');     
    }
}
