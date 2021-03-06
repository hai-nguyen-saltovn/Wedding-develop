<?php

use App\Models\Role;
use App\Models\Staff;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendors = Vendor::query()->get();
        $roles = Role::query()->where('system_code','BACKYARD')->get();


        foreach ($vendors as $item) {
            $role = $roles->random();
            factory(Staff::class,20)->create([
                'vendor_id' => $item->vendor_id,
                'role_id' => $role->role_id
            ]);
        }
    }
}
