<?php

use App\Models\User;
// note for setting up cache dependeny on main branch
it('provides users in random paginated order', function () {
    $users = User::factory(4)->create();

    $users = collect($this->get('/')->viewData('users')->items())
        ->merge($this->get('/?page=2')->viewData('users')->items());

    expect($users->count())->toBe($users->unique('id')->count());
})->repeat(3);
