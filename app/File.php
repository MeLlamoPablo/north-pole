<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ["name"];

    public function owners() {
        return $this->belongsToMany("App\User")->withTimestamps();
    }
}
