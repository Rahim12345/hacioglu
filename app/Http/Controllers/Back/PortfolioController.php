<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use App\Traits\FileUploader;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $current_banner = '';
        if (\request('banner_id')) {
            $current_banner = Portfolio::whereId(\request('banner_id'))->firstOrFail();
        }

        return view('back.pages.portfolio.index', [
            'banners' => Portfolio::orderBy('id', 'desc')->get(),
            'current_banner' => $current_banner
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => \request('action') == 'create' ? 'required|image' : 'nullable|image',
            'alt_az' => 'nullable|max:250',
            'alt_en' => 'nullable|max:250',
            'alt_ru' => 'nullable|max:250',
        ], [], [
            'photo' => 'Şəkil',
            'alt_az' => 'Alt(az)',
            'alt_en' => 'Alt(en)',
            'alt_ru' => 'Alt(ru)',
        ]);

        if (\request('action') == 'update') {
            $current_banner = Portfolio::whereId(\request('banner_id'))->firstOrFail();
            $photo = $this->fileUpdate($current_banner->photo, $request->hasFile('photo'), $request->photo, 'files/home/brands');
            $current_banner->update([
                'photo' => $photo,
                'alt_az' => $request->alt_az,
                'alt_en' => $request->alt_en,
                'alt_ru' => $request->alt_ru,
            ]);
        } else {
            $photo = $this->fileSave('files/home/brands', $request, 'photo');

            Portfolio::create([
                'photo' => $photo,
                'alt_az' => $request->alt_az,
                'alt_en' => $request->alt_en,
                'alt_ru' => $request->alt_ru,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $current_banner = Portfolio::whereId($id)->firstOrFail();

        $this->fileDelete('files/home/brands/' . $current_banner->photo);
        $current_banner->delete();
//        toastr()->success('Banner silindi','😲😲😲😲😲😲');
        return redirect()->back();
    }
}