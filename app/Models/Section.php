<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Embed;
use App\Models\Paragraph;
use App\Models\Image;


class Section extends Model
{
    use HasFactory;

    public function sectionable()
    {
        return $this->morphTo();
    }
}
