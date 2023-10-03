<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Settings;
use App\Actions\UploadFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\UploadedFile;
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
            'photo' => ['nullable', 'image']
        ]);

        $data['description'] = $request->get('description');

        if($request->file('photo')){

            $this->settings->deletePhoto();

            $imageName = (new UploadFile)
                ->setFile($request->file('photo'))
                ->setUploadPath($this->settings->uploadFolder())
                ->execute();

            $data['photo'] = $imageName;

        }

        $mergedData = array_merge($this->settings->data,$data);

        $this->settings->data = $mergedData;
        $this->settings->save();

        return redirect()->back();

    }
}
