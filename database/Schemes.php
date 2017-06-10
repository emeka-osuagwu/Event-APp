<?php

namespace Emeka\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Schemes
{
    /**
     * This method create users schema.
     */
    public function createRequestTable()
    {
        if (! Capsule::schema()->hasTable('mo')) 
        {

            Capsule::schema()->create('mo', function ($table) {
                $table->increments('id');
                $table->integer('msisdn');
                $table->integer('operatorid');
                $table->integer('shortcodeid');
                $table->string('text');
                $table->integer('status')->default(0);
                $table->timestamps();
            });
            
            return "table created";
        }
        else
        {

            return "table exists";
        }

    }
}