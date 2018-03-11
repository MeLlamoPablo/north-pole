<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileDownload extends Model
{
    public function user() {
        $this->belongsTo("App\User");
    }

    public function file() {
        $this->belongsTo("App\File");
    }
}
