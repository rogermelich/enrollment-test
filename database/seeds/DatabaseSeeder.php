<?php

use Illuminate\Database\Seeder;
use Scool\Enrollment\Database\Seeds\EnrollmentPermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(EnrollmentPermissionsSeeder::class);
    }
}
