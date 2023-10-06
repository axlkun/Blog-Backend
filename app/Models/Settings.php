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

    // Hero
    public function getDescription(): ?string{
        return Arr::get($this->data,'description');
    }

    //About
    public function getAboutDescription(): ?string{
        return Arr::get($this->data,'about_description');
    }

    // Contact
    public function getEmail(): ?string{
        return Arr::get($this->data,'email');
    }

    public function getPhone(): ?string{
        return Arr::get($this->data,'phone');
    }

    public function getAddress(): ?string{
        return Arr::get($this->data,'address');
    }

    public function getGoogleMapUrl(): ?string{
        return Arr::get($this->data,'google_map_url');
    }

    // utils
    public function getImageUrl(string $column): ?string{
        $imageName = Arr::get($this->data,$column);

        return $imageName === null 
            ? "https://ui-avatars.com/api/?name={$column}&color=7F9CF5&background=EBF4FF" 
            : Storage::url("{$this->uploadFolder()}/$imageName");
    }

    public function deletePhoto(): void{
        $imageName = Arr::get($this->data,'photo');

        if($imageName !== null){
            Storage::delete("{$this->uploadFolder()}/$imageName");
        }
    }
}
