<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class PhotoRumah extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['description','rumah_id'];

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }
}
