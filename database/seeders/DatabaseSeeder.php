<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: DatabaseSeeder.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 11/05/2021 5:49:31 pm
 * Last Modified:  19/05/2021 6:06:44 pm
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */

namespace Database\Seeders;
use App\Models\User;
use App\Models\UserProfile;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $admin = new User();
        $admin->name = 'Leonardo Nascimento';
        $admin->email = 'leonardo.nascimento21@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->status_user = 1;
        $admin->save();
    }
}
