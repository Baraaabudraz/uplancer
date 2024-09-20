<?php

use App\Models\Team;

function count_TeamMembers(){

    $count_members =  Team::query()->count();

    return $count_members;

}

