<?php

namespace vendor;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [

    ];



    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);

    }


    public function create(request $request){

    }

}
