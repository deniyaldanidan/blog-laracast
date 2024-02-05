<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "excerpt",
        "body",
        "slug"
    ];

    // protected $guarded = ["id"];

    /*
    //* Following method will make slug as a default route binder. If this is removed default will be id aka Primary Key
    public function getRouteKeyName()
    {
        return "slug";
    }
    */
}
