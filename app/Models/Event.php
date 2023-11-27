<?php

//namespace vendor;
namespace App\Models;

//use App\Models\User;
use App\Enums\EventStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [

    ];

    //protected $primaryKey = 'client_id';

    protected $casts = [
        'status' => EventStateEnum::class,
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);

    }


    public function events():HasMany
    {
        return $this->belongsTo(user::class);
    }


    public function create(request $request){
    }





}
