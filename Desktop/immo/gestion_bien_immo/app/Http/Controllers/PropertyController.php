<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Mail\PropertyContactMail;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchPropertiesRequest $request)
    {   
            $query = Property::query()->orderBy('created_at', 'desc');
            if($price = $request->validated('price') ) {
                $query = $query->where('price', '<=', $price);
            }
            if($request->validated('surface') ) {
                $query = $query->where('surface', '<=', $request->validated('surface'));
            }
            if($request->validated('rooms') ) {
                $query = $query->where('rooms', '<=', $request->validated('rooms'));
            }
            if($title =  $request->validated('title') ) {
              $query = $query->where('title', 'like', "%$title%");
            }
            // dd($request->validated('title'));
           $properties = Property::paginate(16);
           return view('property.index', [
            'properties' => $query -> paginate(16),
            'input' => $request -> validated()
           ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, Property $property)
    {
        $exceptedSlug = $property->getSlug();
        dd($slug);
        if($slug !== $exceptedSlug ){
            return to_route('property.show', ['slug' => $exceptedSlug  , 'property' => $property]);
        }
        return view('property.show', [
           'property' => $property,
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request ){
        dd('tesst');
        Mail::send( new PropertyContactMail( $property, $request-> validated() ) );
        return back()->with('success','votre demande de contact à bien été envoyé');
    }
   
}
