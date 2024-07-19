<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePairRequest;
use App\Http\Requests\UpdatePairRequest;
use App\Models\Pair;
use App\Traits\FileUploader;

class PairController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pairs = Pair::orderBy('id', 'desc')->get();
        return view('back.pages.pairs.pairs',[
            'pairs'=>$pairs
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
    public function store(StorePairRequest $request)
    {
        $data = $request->all();

        foreach ($data['before_image'] as $index => $beforeName) {
            $beforeImage = $request->file('before_image')[$index];
            $afterImage = $request->file('after_image')[$index];

            // Save images to the public/images directory
//            $beforeImagePath = $beforeImage->store('images', 'public');
//            $afterImagePath = $afterImage->store('images', 'public');

            $before_name = $beforeImage->hashName();
            $beforeImage->move(public_path('images'), $before_name);

            $after_name = $afterImage->hashName();
            $afterImage->move(public_path('images'), $after_name);

            // Save data to the database (implement your own logic here)
            Pair::create([
                'before_image' => $before_name,
                'after_image' => $after_name,
            ]);
        }

        return response()->json(['success' => 'Pairs saved successfully']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Pair $pair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pair $pair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePairRequest $request, Pair $pair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pair $pair)
    {
        $pair->delete();
        return back();
    }
}
