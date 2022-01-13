<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $permissions = [
            /*Admin permissions*/
            'system-management','role-management','user-management',
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'user-list', 'user-create', 'user-edit', 'user-ban',
            /*project manager permission*/
            'project-manager-management','project-manager-comment','user-project-manager',
            'book-view', 'book-create', 'book-edit','book-delete',
            'booktype-view', 'booktype-create', 'booktype-edit','booktype-delete',
            'region-view', 'region-create', 'region-edit','region-delete',
            'council-view', 'council-create', 'council-edit','council-delete',
            'headmaster-view', 'headmaster-create', 'headmaster-edit','headmaster-delete',
            'statisticalofficer-view', 'statisticalofficer-create', 'statisticaloficer-edit','statisticalofficer-delete',
            'level-view', 'level-create', 'level-edit','level-delete',
            'school-view', 'school-create', 'school-edit','school-delete',
            'projectmanager-view', 'projectmanager-create', 'projectmanager-edit','projectmanager-delete',
            /*Statistical officer permissions*/
            'council-management','statisticalofficer-comment','user-statisticalofficer',
            'school-management',
            /*headmaster permission*/
            'headmaster-comment'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
