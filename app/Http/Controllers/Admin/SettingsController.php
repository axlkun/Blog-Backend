<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Settings;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingsResource;

class SettingsController extends Controller
{
    //
    private $settings;

    public function __construct()
    {
        $this->settings = Settings::find(1) ?? new Settings();
    }

    public function create(Request $request){

        return Inertia::render('Settings/Create',[
            'settings' => new SettingsResource($this->settings)
        ]);
    }

    public function saveHero(Request $request){
        $request->validate([
            'description' => ['required' => 'string'],
            'photo' => ['nulleable' => 'image']
        ]);

        $data['description'] = $request->get('description');

        if($request->file('photo')){

            $this->settings->deletePhoto();

            $imageFullName = $request->file('photo')->getClientOriginalName();
            $imageName = (string) Str::of($imageFullName)
                ->beforeLast('.')
                ->slug()
                ->append('.')
                ->append($request->file('photo')->getClientOriginalExtension());
            
            $data['photo'] = $imageName;

            $request->file('photo')->storeAs($this->settings->uploadFolder(),$imageName);
        }

        $this->settings->data = $data;
        $this->settings->save();

        return redirect()->back();

    }
}
