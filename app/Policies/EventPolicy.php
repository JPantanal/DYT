<?php

namespace App\Policies;

use App\Models\User;

class EventPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function viewAny(user $user)
    {

    }
    public function view(event $event){

    }

    public function create(event $event)
    {
        //
    }
    public function update(event $event)
    {
        //
    }

    public function delete(event $event)
    {
        //
    }



}
