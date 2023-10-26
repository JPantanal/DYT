<?php

//namespace vendor;
namespace App\Models;

//use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [

    ];


/*
 *     public const Status = [
        'Pending' => 0,
        'Active'  => 1,
        'Denied'  => 2,
        'Cancelled' => 3,

    ];
 *
 *
 *
 *
 *
 *
 */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);

    }


    public function create(request $request){
    }

}
