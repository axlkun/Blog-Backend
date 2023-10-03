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

    public function getPhotoUrl(): ?string{
        
        return $this->getImageUrl('photo');

    }

    //About
    public function getAboutDescription(): ?string{
        return Arr::get($this->data,'about_description');
    }

    public function getAboutPhotoUrl(): ?string{
        
        return $this->getImageUrl('about_photo');
    }

    public function getImageUrl(string $column): ?string{
        $imageName = Arr::get($this->data,$column);

        return $imageName === null ? "https://ui-avatars.com/api/?name={$column}&color=7F9CF5&background=EBF4FF" : Storage::url("{$this->uploadFolder()}/$imageName");
    }

    public function deletePhoto(): void{
        $imageName = Arr::get($this->data,'photo');

        if($imageName !== null){
            Storage::delete("{$this->uploadFolder()}/$imageName");
        }
    }
}
