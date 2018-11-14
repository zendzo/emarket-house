<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    protected $fillable = ['name','address','description'];

    public function rumahs()
    {
        return $this->hasMany(Rumah::class);
    }
}
