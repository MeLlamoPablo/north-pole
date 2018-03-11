<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ["name"];

    public function owners() {
        return $this->belongsToMany("App\User")->withTimestamps();
    }

    public function downloads() {
        return $this->hasMany("App\FileDownload");
    }

    public function getSizeMB() {
        return round($this->size / (1024 * 1024), 2);
    }
}
