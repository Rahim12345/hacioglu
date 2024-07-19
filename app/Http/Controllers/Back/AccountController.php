<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Traits\FileUploader;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    use FileUploader;

    public function index()
    {
        return view('back.pages.account.index');
    }

    public function store(Request $request)
    {
        $rules = [
            'action' => 'required'
        ];

        $attributes = [
            'action' => 'Əməliyyat'
        ];

        if ($request->has('action') && $request->action == 'avatar') {
            $rules['avatar'] = 'required|image|max:2048';
            $attributes['avatar'] = 'Profil şəkili';
        } else {
            $rules['name'] = 'required|max:15';
            $rules['last_name'] = 'required|max:15';
            $rules['password'] = 'required|max:15';

            $attributes['name'] = 'Ad';
            $attributes['last_name'] = 'Soyad';
            $attributes['password'] = 'Şifrə';
        }

        $this->validate($request, $rules, [], $attributes);

        if ($request->has('action') && $request->action == 'avatar') {
            $src = $this->fileUpdate(auth()->user()->avatar, $request->hasFile('avatar'), $request->avatar, 'files/avatars/');

            auth()->user()->update([
                'avatar' => $src
            ]);

            return response()->json([
                'action' => 'avatar',
                'src' => asset('files/avatars/' . $src),
            ]);
        } else {
            auth()->user()->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'password' => bcrypt($request->password),
            ]);

            return response()->json([
                'action' => 'credentials',
                'fullName' => $request->name . ' ' . $request->last_name,
            ]);
        }
    }
}
