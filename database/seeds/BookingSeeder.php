<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['category' => 'Reservas','name' => 'create_bookings']);
        Permission::create(['category' => 'Reservas', 'name' => 'read_bookings']);
        Permission::create(['category' => 'Reservas', 'name' => 'update_bookings']);
        Permission::create(['category' => 'Reservas', 'name' => 'delete_bookings']);
        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo([
            'create_bookings',
            'read_bookings',
            'update_bookings',
            'delete_bookings'
            ]);
    }
}
