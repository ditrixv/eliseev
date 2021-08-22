<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

class Regions extends Model {

    protected $fillable = ['name', 'slag', 'parent_id' ];


    public function parent()
    {
        $this->belongsTo(static::class, 'parent_id', 'id');
    }

    public function children()
    {
        $this->hasMany(static::class,'parent_id','id');
    }


}
