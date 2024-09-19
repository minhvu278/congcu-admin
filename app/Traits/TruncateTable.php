<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait TruncateTable
{
    /**
     * Truncate a table and disable foreign key checks during the process.
     *
     * @param string $table
     * @return void
     */
    public function truncateTable($table)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table($table)->truncate();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
