<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Picture;
// use Illuminate\Http\UploadedFile;
use App\Models\Property;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PictureFormRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Request;

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
        $data['image'] = $image -> store('pictureImg', 'public');
        // dd($data);
        return $data;

    }


    /**
     * Display a listing of the resource.
     */
    public function index() 
    {    
        return view('admin.pictures.index', [
            'properties' =>Property::orderBy('created_at', 'desc')->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Property $property)
    {
        return view('admin.pictures.form', [
            'picture' => new Picture(),
            'property' => $property,
            'options' => Option::pluck('name', 'id'),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(PictureFormRequest $request, Picture $picture, Property $property )
    {   
        dd($property->id);

       // $picture = Picture::create( $this -> extractDataWithImage($request,  $picture ));
        $picture ->bedRooms()->sync($request->validated('picture'));
        return to_route('admin.picture.index')->with('success', 'Le bien a bien été crée');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $property)
    {   
        
        return view('admin.pictures.form', [
            'property' => $property, 
            'options' =>Option::pluck('name', 'id'),
            'picture' => new Picture(),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update( PictureFormRequest $request,  Picture $picture,) 
    {
        // /** @var UploadFile | null $image */
        $picture ->update($this -> extractDataWithImage( $request,  $picture ) );
        $picture ->options()->sync($request->validated('options')); 
        return to_route('admin.picture.index')->with('success', 'Le bien a bien été édité');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture )
    {
        if($picture -> image ){
            Storage::disk('public')->delete($picture -> image);
        }
        $picture->delete( $picture );
        return to_route('admin.picture.index')->with('success', 'Le bien a bien été supprimé');     
    }

   
}
