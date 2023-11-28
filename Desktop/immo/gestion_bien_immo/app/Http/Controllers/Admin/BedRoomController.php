<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use App\Models\BedRoom;
// use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Admin\BedRoomFormRequest;
use Illuminate\Support\Facades\Storage;

class BedRoomController extends Controller
{

    private function extractDataWithImage(BedRoomFormRequest $request, BedRoom $bedRoom ): array 
    {
        // La je traite les données qui sont envoyé par le navigateur
        $data = $request -> validated();
        $image = $request ->validated('image');
        //dd($image);
        if($image === null || $image ->getError() ){
            return $data;
        }
        //la je traite les données de l'instance du model
        if($bedRoom -> image ){
            Storage::disk('public')->delete($bedRoom -> image);
        }
        $data['image'] = $image -> store('bedRoomImg', 'public');
        // dd($data);
        return $data;

    }


    /**
     * Display a listing of the resource.
     */
    public function index() 
    {    
        return view('admin.bedRoom.index', [
            'bedRooms' =>BedRoom::orderBy('created_at', 'desc')->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bedRoom = new BedRoom();
        $bedRoom->fill([ 'name' => 'Chambre principal', 'number' => '4', 'surface' => 65, 'description' => 'C\'est la chambre principal pour papa et mama', 'toilet' => 'Salle de bain', 'balcony' =>'4']); 
        return view('admin.BedRoom.form', [
            'bedRoom' => $bedRoom,
            'properties' => Property::pluck('title', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BedRoomFormRequest $request, BedRoom $bedRoom	)
    {     
        // $data = $request -> validated();
        // $image = $request ->validated('image');
        // if($image === null || $image ->getError() ){
        //     return $data;
        // }
        // //la je traite les données de l'instance du model
        // if($bedRoom -> image ){
        //     Storage::disk('public')->delete($bedRoom -> image);
        // }
        // $data['image'] = $image -> store('bedRoomImg', 'public');
        // // dd($data);
       
        $bedRoom = BedRoom::create( $this -> extractDataWithImage($request,  $bedRoom ));
        //$bedRoom ->property()->sync($request->validated('property_id')); 
        return to_route('admin.BedRoom.index')->with('success', 'Le bien a bien été crée');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BedRoom $bedRoom)
    {  
        return view('admin.bedRoom.form', ['bedRoom' => $bedRoom, 'properties' =>property::pluck('title', 'id') ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update( BedRoomFormRequest $request,  BedRoom $bedRoom,) 
    {
        // /** @var UploadFile | null $image */
        $bedRoom ->update($this -> extractDataWithImage( $request,  $bedRoom ) );
        $bedRoom ->options()->sync($request->validated('options')); 
        return to_route('admin.BedRoom.index')->with('success', 'Le bien a bien été édité');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BedRoom $bedRoom )
    {  
        if($bedRoom -> image ){
            Storage::disk('public')->delete($bedRoom -> image);
        }
        $bedRoom->delete( $bedRoom );
        return to_route('admin.BedRoom.index')->with('success', 'Le bien a bien été supprimé');     
    }

   
}
