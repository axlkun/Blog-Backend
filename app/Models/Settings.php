<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'data' => 'array'
    ];

    public function uploadFolder():string{
        return "public/settings";
    }

    public function getDescription(): ?string{
        return Arr::get($this->data,'description');
    }

    public function getPhotoUrl(): ?string{
        
        $imageName = Arr::get($this->data,'photo');

        return $imageName === null ? 'https://ui-avatars.com/api/?name=photo&color=7F9CF5&background=EBF4FF' : Storage::url("{$this->uploadFolder()}/$imageName");
    }

    public function deletePhoto(): void{
        $imageName = Arr::get($this->data,'photo');

        if($imageName !== null){
            Storage::delete("{$this->uploadFolder()}/$imageName");
        }
    }
}
