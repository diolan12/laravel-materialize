<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use App\Models\Section;
use App\Models\Embed;
use App\Models\Paragraph;
use App\Models\Image;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
