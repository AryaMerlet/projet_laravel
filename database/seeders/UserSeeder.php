<?php

namespace Database\Seeders;

use App\Models\User;
use Bouncer;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Bouncer::allow('admin')->to('user-retrieve');
        Bouncer::allow('admin')->to('user-create');
        Bouncer::allow('admin')->to('user-update');
        Bouncer::allow('admin')->to('user-delete');

        Bouncer::allow('admin')->to('motif-retrieve');
        Bouncer::allow('admin')->to('motif-create');
        Bouncer::allow('admin')->to('motif-update');
        Bouncer::allow('admin')->to('motif-delete');

        Bouncer::allow('admin')->to('absence-retrieve');
        Bouncer::allow('admin')->to('absence-create');
        Bouncer::allow('admin')->to('absence-update');
        Bouncer::allow('admin')->to('absence-delete');

        Bouncer::allow('salarie')->to('absence-retrieve');
        Bouncer::allow('salarie')->to('absence-create');
        Bouncer::allow('salarie')->to('absence-update');
        Bouncer::allow('salarie')->to('motif-retrieve');

        $i = 0;
        while ($i < 10) {
            $user = user::factory()->create();
            Bouncer::assign('salarie')->to($user);
            $i++;
        }

        $arya = User::where('firstname', 'Arya')->first();
        if (! $arya) {
            $admin = user::factory()->createadmin();
            Bouncer::assign('admin')->to($admin);
        }

    }
}
