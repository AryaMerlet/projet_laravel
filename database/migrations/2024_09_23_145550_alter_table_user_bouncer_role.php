<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Bouncer::allow('admin')->to('user-retrieve');
        Bouncer::allow('admin')->to('user-create');
        Bouncer::allow('admin')->to('user-update');
        Bouncer::allow('admin')->to('user-delete');

        Bouncer::allow('admin')->to('motif-retrieve');
        Bouncer::allow('admin')->to('motif-create');
        Bouncer::allow('admin')->to('motif-update');
        Bouncer::allow('admin')->to('motif-delete');

        Bouncer::allow('salarie')->to('motif-retrieve');
        Bouncer::allow('salarie')->to('motif-update');

        $user = User::where('firstname', 'Arya')->first();
        Bouncer::assign('admin')->to($user);

        Bouncer::refresh();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
