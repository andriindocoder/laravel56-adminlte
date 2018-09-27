<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Administrator";
        $admin->save();

        $editor = new Role();
        $editor->name = "editor";
        $editor->display_name = "Editor";
        $editor->save();

        $author = new Role();
        $author->name = "author";
        $author->display_name = "Author";
        $author->save();

        $user1 = User::find(1); //superadmin
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        $user2 = User::find(2); //editor
        $user2->detachRole($editor);
        $user2->attachRole($editor);

        $user3 = User::find(3); //author
        $user3->detachRole($author);
        $user3->attachRole($author);
    }
}
