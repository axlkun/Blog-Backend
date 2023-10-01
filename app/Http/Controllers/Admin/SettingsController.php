<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingsResource;
use App\Models\Settings;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingsController extends Controller
{
    //
    public function create(Request $request){
        $settings = Settings::find(1) ?? new Settings();

        return Inertia::render('Settings/Create',[
            'settings' => new SettingsResource($settings)
        ]);
    }
}
