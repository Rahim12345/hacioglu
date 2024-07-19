<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Traits\FileUploader;

class ServiceController extends Controller
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
            $current_banner = Service::whereId(\request('banner_id'))->firstOrFail();
        }

        return view('back.pages.service.index', [
            'banners' => Service::orderBy('id', 'desc')->get(),
            'current_banner' => $current_banner
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        if (\request('action') == 'update') {
            $current_banner = Service::whereId(\request('banner_id'))->firstOrFail();
            $photo = $this->fileUpdate($current_banner->photo, $request->hasFile('photo'), $request->photo, 'files/services/');
            $before_photo = $this->fileUpdate($current_banner->before_photo, $request->hasFile('before_photo'), $request->before_photo, 'files/services/');
            $after_photo = $this->fileUpdate($current_banner->after_photo, $request->hasFile('after_photo'), $request->after_photo, 'files/services/');

            $current_banner->update([
                'photo' => $photo,
                'name_az' => $request->name_az,
                'name_en' => $request->name_en,
                'name_ru' => $request->name_ru,
                'slug_az' => str_slug($request->name_az),
                'slug_en' => str_slug($request->name_en),
                'slug_ru' => str_slug($request->name_ru),
                'text_az' => $request->text_az,
                'text_en' => $request->text_en,
                'text_ru' => $request->text_ru,
                'before_photo' => $before_photo,
                'after_photo' => $after_photo,
            ]);
        } else {
            $photo = $this->fileSave('files/services', $request, 'photo');
            $before_photo = $this->fileSave('files/services', $request, 'before_photo');
            $after_photo = $this->fileSave('files/services', $request, 'after_photo');

            Service::create([
                'photo' => $photo,
                'name_az' => $request->name_az,
                'name_en' => $request->name_en,
                'name_ru' => $request->name_ru,
                'slug_az' => str_slug($request->name_az),
                'slug_en' => str_slug($request->name_en),
                'slug_ru' => str_slug($request->name_ru),
                'text_az' => $request->text_az,
                'text_en' => $request->text_en,
                'text_ru' => $request->text_ru,
                'before_photo' => $before_photo,
                'after_photo' => $after_photo,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $current_banner = Service::whereId($id)->firstOrFail();

        $this->fileDelete('files/services/' . $current_banner->photo);
        $this->fileDelete('files/services/' . $current_banner->before_photo);
        $this->fileDelete('files/services/' . $current_banner->after_photo);
        $current_banner->delete();
//        toastr()->success('Banner silindi','😲😲😲😲😲😲');
        return redirect()->back();
    }
}
