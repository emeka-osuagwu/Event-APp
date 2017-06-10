<?php

namespace Emeka\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class DropSchemes
{
    /**
     * This method create users schema.
     */
    public function dropUsersTable()
    {
        Capsule::schema::('users');
    }

}