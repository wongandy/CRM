<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory;
    // use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'client_id',
        'team_id',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
