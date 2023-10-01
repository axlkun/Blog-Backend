<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Settings extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'data' => 'array'
    ];

    public function getDescription(): ?string{
        return Arr::get($this->data,'description');
    }

    public function getPhotoUrl(): ?string{
        // return Arr::get($this->data,'photo_url');
        return 'https://ui-avatars.com/api/?name=photo&color=7F9CF5&background=EBF4FF';
    }
}
