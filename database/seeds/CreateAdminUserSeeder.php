<?php


use Illuminate\Database\Seeder;
use App\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $adminuser = User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin@123'),
            'firstname'=>'Idrisa',
            'lastname'=>'Juma',
            'phonenumber'=>'0765100417',
                ]
        );
        $projectmanageruser =new User();
        $projectmanageruser->email='projectmanager@gmail.com';
        $projectmanageruser->password=bcrypt('Admin@123');
        $projectmanageruser->firstname='Idrisa';
        $projectmanageruser->lastname='Juma';
        $projectmanageruser->phonenumber='0716678117';
        $projectmanageruser->save();
        $projectmanageruserdetails=new \App\Projectmanager();
        $projectmanageruser->projectmanagers()->save($projectmanageruserdetails);
        /*Statistical officer in ARUSHA Region*/

        $arushacc =new User();
        $arushacc->email='arushacc@gmail.com';
        $arushacc->password=bcrypt('Admin@123');
        $arushacc->firstname='Idrisa';
        $arushacc->lastname='Juma';
        $arushacc->phonenumber='0716678117';
        $arushacc->region_id=1;
        $arushacc->council_id=1;
        $arushacc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $arushacc->statisticalofficers()->save($statisticalofficersuserdetails);



        $arushadc =new User();
        $arushadc->email='arushadc@gmail.com';
        $arushadc->password=bcrypt('Admin@123');
        $arushadc->firstname='Idrisa';
        $arushadc->lastname='Juma';
        $arushadc->phonenumber='0716678117';
        $arushadc->region_id=1;
        $arushadc->council_id=2;
        $arushadc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $arushadc->statisticalofficers()->save($statisticalofficersuserdetails);


        $karatudc =new User();
        $karatudc->email='karatudc@gmail.com';
        $karatudc->password=bcrypt('Admin@123');
        $karatudc->firstname='Idrisa';
        $karatudc->lastname='Juma';
        $karatudc->phonenumber='0716678117';
        $karatudc->region_id=1;
        $karatudc->council_id=3;
        $karatudc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $karatudc->statisticalofficers()->save($statisticalofficersuserdetails);


        $longidodc =new User();
        $longidodc->email='longidodc@gmail.com';
        $longidodc->password=bcrypt('Admin@123');
        $longidodc->firstname='Idrisa';
        $longidodc->lastname='Juma';
        $longidodc->phonenumber='0716678117';
        $longidodc->region_id=1;
        $longidodc->council_id=4;
        $longidodc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $longidodc->statisticalofficers()->save($statisticalofficersuserdetails);



        $merudc =new User();
        $merudc->email='merudc@gmail.com';
        $merudc->password=bcrypt('Admin@123');
        $merudc->firstname='Idrisa';
        $merudc->lastname='Juma';
        $merudc->phonenumber='0716678117';
        $merudc->region_id=1;
        $merudc->council_id=5;
        $merudc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $merudc->statisticalofficers()->save($statisticalofficersuserdetails);


        $mondulidc = new User();
        $mondulidc->email='mondulidc@gmail.com';
        $mondulidc->password=bcrypt('Admin@123');
        $mondulidc->firstname='Idrisa';
        $mondulidc->lastname='Juma';
        $mondulidc->phonenumber='0716678117';
        $mondulidc->region_id=1;
        $mondulidc->council_id=6;
        $mondulidc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $mondulidc->statisticalofficers()->save($statisticalofficersuserdetails);


        $ngorongorodc =new User();
        $ngorongorodc->email='ngorongorodc@gmail.com';
        $ngorongorodc->password=bcrypt('Admin@123');
        $ngorongorodc->firstname='Idrisa';
        $ngorongorodc->lastname='Juma';
        $ngorongorodc->phonenumber='0716678117';
        $ngorongorodc->region_id=1;
        $ngorongorodc->council_id=7;
        $ngorongorodc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $ngorongorodc->statisticalofficers()->save($statisticalofficersuserdetails);


        /*Statistical officer in Dar Es Salaam Region*/

        $ilalamc =new User();
        $ilalamc->email='ilalamc@gmail.com';
        $ilalamc->password=bcrypt('Admin@123');
        $ilalamc->firstname='Idrisa';
        $ilalamc->lastname='Juma';
        $ilalamc->phonenumber='0716678117';
        $ilalamc->region_id=2;
        $ilalamc->council_id=8;
        $ilalamc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $ilalamc->statisticalofficers()->save($statisticalofficersuserdetails);



        $kigambonimc =new User();
        $kigambonimc->email='kigambonimc@gmail.com';
        $kigambonimc->password=bcrypt('Admin@123');
        $kigambonimc->firstname='Idrisa';
        $kigambonimc->lastname='Juma';
        $kigambonimc->phonenumber='0716678117';
        $kigambonimc->region_id=2;
        $kigambonimc->council_id=9;
        $kigambonimc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $kigambonimc->statisticalofficers()->save($statisticalofficersuserdetails);


        $kinondonimc =new User();
        $kinondonimc->email='kinondonimc@gmail.com';
        $kinondonimc->password=bcrypt('Admin@123');
        $kinondonimc->firstname='Idrisa';
        $kinondonimc->lastname='Juma';
        $kinondonimc->phonenumber='0716678117';
        $kinondonimc->region_id=2;
        $kinondonimc->council_id=10;
        $kinondonimc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $kinondonimc->statisticalofficers()->save($statisticalofficersuserdetails);

        $temekemc =new User();
        $temekemc->email='temekemc@gmail.com';
        $temekemc->password=bcrypt('Admin@123');
        $temekemc->firstname='abdul';
        $temekemc->lastname='mkumba';
        $temekemc->phonenumber='0716678117';
        $temekemc->region_id=2;
        $temekemc->council_id=11;
        $temekemc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $temekemc->statisticalofficers()->save($statisticalofficersuserdetails);


        $ubungomc =new User();
        $ubungomc->email='ubungomc@gmail.com';
        $ubungomc->password=bcrypt('Admin@123');
        $ubungomc->firstname='abdul';
        $ubungomc->lastname='mkumba';
        $ubungomc->phonenumber='0716678117';
        $ubungomc->region_id=2;
        $ubungomc->council_id=12;
        $ubungomc->save();
        $statisticalofficersuserdetails=new \App\Statisticalofficer();
        $ubungomc->statisticalofficers()->save($statisticalofficersuserdetails);



       /*Head master's  in ARUSHA Region*/

        $headmasterkigogoni =new User();
        $headmasterkigogoni ->email='headmasterkigogoni@gmail.com';
        $headmasterkigogoni ->password=bcrypt('Admin@123');
        $headmasterkigogoni ->firstname='abdul';
        $headmasterkigogoni ->lastname='mkumba';
        $headmasterkigogoni->phonenumber='0716678117';
        $headmasterkigogoni ->region_id=1;
        $headmasterkigogoni ->council_id=1;
        $headmasterkigogoni ->school_id=1;
        $headmasterkigogoni ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterkigogoni->headmasters()->save($headmasteruserdetails);


        $headmasterkilimanjaroa =new User();
        $headmasterkilimanjaroa ->email='headmasterkilimanjaroa@gmail.com';
        $headmasterkilimanjaroa ->password=bcrypt('Admin@123');
        $headmasterkilimanjaroa ->firstname='abdul';
        $headmasterkilimanjaroa ->lastname='mkumba';
        $headmasterkilimanjaroa->phonenumber='0716678117';
        $headmasterkilimanjaroa ->region_id=1;
        $headmasterkilimanjaroa ->council_id=1;
        $headmasterkilimanjaroa ->school_id=2;
        $headmasterkilimanjaroa ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterkilimanjaroa->headmasters()->save($headmasteruserdetails);


        $headmasterhighridge =new User();
        $headmasterhighridge ->email='headmasterhighridge@gmail.com';
        $headmasterhighridge ->password=bcrypt('Admin@123');
        $headmasterhighridge ->firstname='abdul';
        $headmasterhighridge ->lastname='mkumba';
        $headmasterhighridge ->phonenumber='0716678117';
        $headmasterhighridge ->region_id=1;
        $headmasterhighridge ->council_id=2;
        $headmasterhighridge ->school_id=3;
        $headmasterhighridge ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterhighridge->headmasters()->save($headmasteruserdetails);


        $headmasterhope =new User();
        $headmasterhope ->email='headmasterhope@gmail.com';
        $headmasterhope ->password=bcrypt('Admin@123');
        $headmasterhope ->firstname='abdul';
        $headmasterhope ->lastname='mkumba';
        $headmasterhope ->phonenumber='0716678117';
        $headmasterhope ->region_id=1;
        $headmasterhope ->council_id=2;
        $headmasterhope ->school_id=4;
        $headmasterhope ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterhope->headmasters()->save($headmasteruserdetails);


        $headmastergeer =new User();
        $headmastergeer ->email='headmastergeer@gmail.com';
        $headmastergeer ->password=bcrypt('Admin@123');
        $headmastergeer ->firstname='abdul';
        $headmastergeer ->lastname='mkumba';
        $headmastergeer ->phonenumber='0716678117';
        $headmastergeer ->region_id=1;
        $headmastergeer ->council_id=3;
        $headmastergeer ->school_id=5;
        $headmastergeer ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmastergeer->headmasters()->save($headmasteruserdetails);


        $headmastergendaa =new User();
        $headmastergendaa ->email='headmastergendaa@gmail.com';
        $headmastergendaa ->password=bcrypt('Admin@123');
        $headmastergendaa ->firstname='abdul';
        $headmastergendaa ->lastname='mkumba';
        $headmastergendaa ->phonenumber='0716678117';
        $headmastergendaa ->region_id=1;
        $headmastergendaa ->council_id=3;
        $headmastergendaa ->school_id=6;
        $headmastergendaa ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmastergendaa->headmasters()->save($headmasteruserdetails);


        $headmasterkitarini =new User();
        $headmasterkitarini ->email='headmasterkitarini@gmail.com';
        $headmasterkitarini ->password=bcrypt('Admin@123');
        $headmasterkitarini ->firstname='abdul';
        $headmasterkitarini ->lastname='mkumba';
        $headmasterkitarini ->phonenumber='0716678117';
        $headmasterkitarini ->region_id=1;
        $headmasterkitarini ->council_id=4;
        $headmasterkitarini ->school_id=7;
        $headmasterkitarini ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterkitarini->headmasters()->save($headmasteruserdetails);


        $headmasterkitendini =new User();
        $headmasterkitendini ->email='headmasterkitendini@gmail.com';
        $headmasterkitendini ->password=bcrypt('Admin@123');
        $headmasterkitendini ->firstname='abdul';
        $headmasterkitendini ->lastname='mkumba';
        $headmasterkitendini ->phonenumber='0716678117';
        $headmasterkitendini ->region_id=1;
        $headmasterkitendini ->council_id=4;
        $headmasterkitendini ->school_id=8;
        $headmasterkitendini ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterkitendini->headmasters()->save($headmasteruserdetails);


        $headmasteraimborajunior =new User();
        $headmasteraimborajunior ->email='headmasteraimborajunior@gmail.com';
        $headmasteraimborajunior ->password=bcrypt('Admin@123');
        $headmasteraimborajunior ->firstname='abdul';
        $headmasteraimborajunior ->lastname='mkumba';
        $headmasteraimborajunior ->phonenumber='0716678117';
        $headmasteraimborajunior ->region_id=1;
        $headmasteraimborajunior ->council_id=5;
        $headmasteraimborajunior ->school_id=9;
        $headmasteraimborajunior ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasteraimborajunior->headmasters()->save($headmasteruserdetails);


        $headmasterakerihopeenglishmedium =new User();
        $headmasterakerihopeenglishmedium ->email='headmasterakerihopeenglishmedium@gmail.com';
        $headmasterakerihopeenglishmedium ->password=bcrypt('Admin@123');
        $headmasterakerihopeenglishmedium ->firstname='abdul';
        $headmasterakerihopeenglishmedium ->lastname='mkumba';
        $headmasterakerihopeenglishmedium ->phonenumber='0716678117';
        $headmasterakerihopeenglishmedium ->region_id=1;
        $headmasterakerihopeenglishmedium ->council_id=5;
        $headmasterakerihopeenglishmedium ->school_id=10;
        $headmasterakerihopeenglishmedium ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterakerihopeenglishmedium->headmasters()->save($headmasteruserdetails);


        $headmasterkilimatinde =new User();
        $headmasterkilimatinde ->email='headmasterkilimatinde@gmail.com';
        $headmasterkilimatinde ->password=bcrypt('Admin@123');
        $headmasterkilimatinde->firstname='abdul';
        $headmasterkilimatinde ->lastname='mkumba';
        $headmasterkilimatinde ->phonenumber='0716678117';
        $headmasterkilimatinde ->region_id=1;
        $headmasterkilimatinde ->council_id=6;
        $headmasterkilimatinde ->school_id=11;
        $headmasterkilimatinde ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterkilimatinde->headmasters()->save($headmasteruserdetails);


        $headmasterkipok =new User();
        $headmasterkipok ->email='headmasterkipok@gmail.com';
        $headmasterkipok ->password=bcrypt('Admin@123');
        $headmasterkipok->firstname='abdul';
        $headmasterkipok ->lastname='mkumba';
        $headmasterkipok ->phonenumber='0716678117';
        $headmasterkipok ->region_id=1;
        $headmasterkipok ->council_id=6;
        $headmasterkipok ->school_id=12;
        $headmasterkipok ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterkipok->headmasters()->save($headmasteruserdetails);


        $headmastermamasara =new User();
        $headmastermamasara ->email='headmastermamasara@gmail.com';
        $headmastermamasara->password=bcrypt('Admin@123');
        $headmastermamasara->firstname='abdul';
        $headmastermamasara ->lastname='mkumba';
        $headmastermamasara ->phonenumber='0716678117';
        $headmastermamasara ->region_id=1;
        $headmastermamasara ->council_id=7;
        $headmastermamasara ->school_id=13;
        $headmastermamasara ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmastermamasara->headmasters()->save($headmasteruserdetails);


        $headmastermariecorrenson =new User();
        $headmastermariecorrenson ->email='headmastermariecorrenson@gmail.com';
        $headmastermariecorrenson->password=bcrypt('Admin@123');
        $headmastermariecorrenson->firstname='abdul';
        $headmastermariecorrenson ->lastname='mkumba';
        $headmastermariecorrenson ->phonenumber='0716678117';
        $headmastermariecorrenson ->region_id=1;
        $headmastermariecorrenson ->council_id=7;
        $headmastermariecorrenson ->school_id=14;
        $headmastermariecorrenson ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmastermariecorrenson->headmasters()->save($headmasteruserdetails);


      /*Head master's  in Dar Es Salaam Region*/

        $headmasterabccapital =new User();
        $headmasterabccapital ->email='headmasterabccapital@gmail.com';
        $headmasterabccapital->password=bcrypt('Admin@123');
        $headmasterabccapital->firstname='abdul';
        $headmasterabccapital ->lastname='mkumba';
        $headmasterabccapital ->phonenumber='0716678117';
        $headmasterabccapital ->region_id=2;
        $headmasterabccapital ->council_id=8;
        $headmasterabccapital ->school_id=15;
        $headmasterabccapital ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterabccapital->headmasters()->save($headmasteruserdetails);


        $headmasteracct =new User();
        $headmasteracct ->email='headmasteracct@gmail.com';
        $headmasteracct->password=bcrypt('Admin@123');
        $headmasteracct->firstname='abdul';
        $headmasteracct ->lastname='mkumba';
        $headmasteracct ->phonenumber='0716678117';
        $headmasteracct ->region_id=2;
        $headmasteracct ->council_id=8;
        $headmasteracct ->school_id=16;
        $headmasteracct ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasteracct->headmasters()->save($headmasteruserdetails);


        $headmasterkivukoni =new User();
        $headmasterkivukoni ->email='headmasterkivukoni@gmail.com';
        $headmasterkivukoni->password=bcrypt('Admin@123');
        $headmasterkivukoni->firstname='abdul';
        $headmasterkivukoni ->lastname='mkumba';
        $headmasterkivukoni ->phonenumber='0716678117';
        $headmasterkivukoni ->region_id=2;
        $headmasterkivukoni ->council_id=9;
        $headmasterkivukoni ->school_id=17;
        $headmasterkivukoni ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterkivukoni->headmasters()->save($headmasteruserdetails);


        $headmastermahenge =new User();
        $headmastermahenge ->email='headmastermahenge@gmail.com';
        $headmastermahenge->password=bcrypt('Admin@123');
        $headmastermahenge->firstname='abdul';
        $headmastermahenge ->lastname='mkumba';
        $headmastermahenge ->phonenumber='0716678117';
        $headmastermahenge ->region_id=2;
        $headmastermahenge ->council_id=9;
        $headmastermahenge ->school_id=18;
        $headmastermahenge ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmastermahenge->headmasters()->save($headmasteruserdetails);


        $headmasterfaith =new User();
        $headmasterfaith ->email='headmasterfaith@gmail.com';
        $headmasterfaith->password=bcrypt('Admin@123');
        $headmasterfaith->firstname='abdul';
        $headmasterfaith ->lastname='mkumba';
        $headmasterfaith ->phonenumber='0716678117';
        $headmasterfaith ->region_id=2;
        $headmasterfaith ->council_id=10;
        $headmasterfaith ->school_id=19;
        $headmasterfaith ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterfaith->headmasters()->save($headmasteruserdetails);


        $headmasterfeza =new User();
        $headmasterfeza ->email='headmasterfeza@gmail.com';
        $headmasterfeza->password=bcrypt('Admin@123');
        $headmasterfeza->firstname='abdul';
        $headmasterfeza ->lastname='mkumba';
        $headmasterfeza ->phonenumber='0716678117';
        $headmasterfeza ->region_id=2;
        $headmasterfeza ->council_id=10;
        $headmasterfeza->school_id=20;
        $headmasterfeza ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterfeza->headmasters()->save($headmasteruserdetails);


        $headmasterkigongoni =new User();
        $headmasterkigongoni ->email='headmasterkigongoni@gmail.com';
        $headmasterkigongoni->password=bcrypt('Admin@123');
        $headmasterkigongoni->firstname='abdul';
        $headmasterkigongoni ->lastname='mkumba';
        $headmasterkigongoni->phonenumber='0716678117';
        $headmasterkigongoni ->region_id=2;
        $headmasterkigongoni ->council_id=11;
        $headmasterkigongoni->school_id=21;
        $headmasterkigongoni ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterkigongoni->headmasters()->save($headmasteruserdetails);


        $headmasterkilimanjarot =new User();
        $headmasterkilimanjarot ->email='headmasterkilimanjarot@gmail.com';
        $headmasterkilimanjarot->password=bcrypt('Admin@123');
        $headmasterkilimanjarot->firstname='abdul';
        $headmasterkilimanjarot ->lastname='mkumba';
        $headmasterkilimanjarot->phonenumber='0716678117';
        $headmasterkilimanjarot->region_id=2;
        $headmasterkilimanjarot ->council_id=11;
        $headmasterkilimanjarot->school_id=22;
        $headmasterkilimanjarot ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasterkilimanjarot->headmasters()->save($headmasteruserdetails);


        $headmasteralihassanmwinyiislamic =new User();
        $headmasteralihassanmwinyiislamic ->email='headmasteralihassanmwinyiislamic@gmail.com';
        $headmasteralihassanmwinyiislamic->password=bcrypt('Admin@123');
        $headmasteralihassanmwinyiislamic->firstname='abdul';
        $headmasteralihassanmwinyiislamic ->lastname='mkumba';
        $headmasteralihassanmwinyiislamic->phonenumber='0716678117';
        $headmasteralihassanmwinyiislamic->region_id=2;
        $headmasteralihassanmwinyiislamic ->council_id=12;
        $headmasteralihassanmwinyiislamic->school_id=23;
        $headmasteralihassanmwinyiislamic ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasteralihassanmwinyiislamic->headmasters()->save($headmasteruserdetails);


        $headmasteralliance =new User();
        $headmasteralliance ->email='headmasteralliance@gmail.com';
        $headmasteralliance->password=bcrypt('Admin@123');
        $headmasteralliance->firstname='abdul';
        $headmasteralliance ->lastname='mkumba';
        $headmasteralliance->phonenumber='0716678117';
        $headmasteralliance->region_id=2;
        $headmasteralliance ->council_id=12;
        $headmasteralliance->school_id=24;
        $headmasteralliance ->save();
        $headmasteruserdetails=new \App\Headmaster();
        $headmasteralliance->headmasters()->save($headmasteruserdetails);


        $admin= Role::create([
            'name' => 'Admin',
        ])->givePermissionTo([
            'system-management','role-management','user-management',
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'region-view', 'region-create', 'region-edit','region-delete',
            'council-view', 'council-create', 'council-edit','council-delete',
            'headmaster-view', 'headmaster-create', 'headmaster-edit','headmaster-delete',
            'statisticalofficer-view', 'statisticalofficer-create', 'statisticaloficer-edit','statisticalofficer-delete',
            'user-list', 'user-create', 'user-edit', 'user-ban'
        ]);


        $projectmanager=  Role::create([
            'name' => 'projectmanager',
        ])->givePermissionTo([ 'project-manager-management','project-manager-comment','user-project-manager',
            'book-view', 'book-create', 'book-edit','book-delete',
            'booktype-view', 'booktype-create', 'booktype-edit','booktype-delete',
            'level-view', 'level-create', 'level-edit','level-delete',
            'school-view', 'school-create', 'school-edit','school-delete',
            'projectmanager-view', 'projectmanager-create', 'projectmanager-edit','projectmanager-delete',]);


       $statisticalofficer= Role::create([
            'name' => 'statisticalofficer',
        ])->givePermissionTo([
            'council-management','statisticalofficer-comment',
           'school-management','user-statisticalofficer'
       ]);

       $headmaster= Role::create([
            'name' => 'headmaster',
        ])->givePermissionTo(['school-management','headmaster-comment']);

        $permissions = Permission::pluck('id','id')->all();
        $admin->syncPermissions($permissions);
        $adminuser->assignRole([$admin->id]);
        $projectmanageruser->assignRole([$projectmanager->id]);
        $arushacc->assignRole([$statisticalofficer->id]);
        $arushadc->assignRole([$statisticalofficer->id]);
        $karatudc->assignRole([$statisticalofficer->id]);
        $longidodc->assignRole([$statisticalofficer->id]);
        $merudc->assignRole([$statisticalofficer->id]);
        $mondulidc->assignRole([$statisticalofficer->id]);
        $ngorongorodc->assignRole([$statisticalofficer->id]);
        $ilalamc->assignRole([$statisticalofficer->id]);
        $kigambonimc->assignRole([$statisticalofficer->id]);
        $kinondonimc->assignRole([$statisticalofficer->id]);
        $temekemc->assignRole([$statisticalofficer->id]);
        $ubungomc->assignRole([$statisticalofficer->id]);
        $headmasterkigogoni->assignRole([$headmaster->id]);
        $headmasterkilimanjaroa->assignRole([$headmaster->id]);
        $headmasterhighridge->assignRole([$headmaster->id]);
        $headmasterhope->assignRole([$headmaster->id]);
        $headmastergeer->assignRole([$headmaster->id]);
        $headmastergendaa->assignRole([$headmaster->id]);
        $headmasterkitarini->assignRole([$headmaster->id]);
        $headmasterkitendini->assignRole([$headmaster->id]);
        $headmasteraimborajunior->assignRole([$headmaster->id]);
        $headmasterakerihopeenglishmedium->assignRole([$headmaster->id]);
        $headmasterkilimatinde->assignRole([$headmaster->id]);
        $headmasterkipok->assignRole([$headmaster->id]);
        $headmastermamasara->assignRole([$headmaster->id]);
        $headmastermariecorrenson->assignRole([$headmaster->id]);
        $headmasterabccapital->assignRole([$headmaster->id]);
        $headmasteracct->assignRole([$headmaster->id]);
        $headmasterkivukoni->assignRole([$headmaster->id]);
        $headmastermahenge->assignRole([$headmaster->id]);
        $headmasterfaith->assignRole([$headmaster->id]);
        $headmasterfeza->assignRole([$headmaster->id]);
        $headmasterkigongoni->assignRole([$headmaster->id]);
        $headmasterkilimanjarot->assignRole([$headmaster->id]);
        $headmasteralihassanmwinyiislamic->assignRole([$headmaster->id]);
        $headmasteralliance->assignRole([$headmaster->id]);
        app('auth.password.broker')->createToken($adminuser);
        app('auth.password.broker')->createToken($projectmanageruser);
        app('auth.password.broker')->createToken($arushacc);
        app('auth.password.broker')->createToken($arushadc);
        app('auth.password.broker')->createToken($karatudc);
        app('auth.password.broker')->createToken($longidodc);
        app('auth.password.broker')->createToken($merudc);
        app('auth.password.broker')->createToken($mondulidc);
        app('auth.password.broker')->createToken($ngorongorodc);
        app('auth.password.broker')->createToken($ilalamc);
        app('auth.password.broker')->createToken($kigambonimc);
        app('auth.password.broker')->createToken($kinondonimc);
        app('auth.password.broker')->createToken($temekemc);
        app('auth.password.broker')->createToken($ubungomc);
        app('auth.password.broker')->createToken($headmasterkigogoni);
        app('auth.password.broker')->createToken($headmasterkilimanjaroa);
        app('auth.password.broker')->createToken($headmasterhighridge);
        app('auth.password.broker')->createToken($headmasterhope);
        app('auth.password.broker')->createToken($headmastergeer);
        app('auth.password.broker')->createToken($headmastergendaa);
        app('auth.password.broker')->createToken($headmasterkitarini);
        app('auth.password.broker')->createToken($headmasterkitendini);
        app('auth.password.broker')->createToken($headmasteraimborajunior);
        app('auth.password.broker')->createToken($headmasterakerihopeenglishmedium);
        app('auth.password.broker')->createToken($headmasterkilimatinde);
        app('auth.password.broker')->createToken($headmasterkipok);
        app('auth.password.broker')->createToken($headmastermamasara);
        app('auth.password.broker')->createToken($headmastermariecorrenson);
        app('auth.password.broker')->createToken($headmasterabccapital);
        app('auth.password.broker')->createToken($headmasteracct);
        app('auth.password.broker')->createToken($headmasterkivukoni);
        app('auth.password.broker')->createToken($headmastermahenge);
        app('auth.password.broker')->createToken($headmasterfaith);
        app('auth.password.broker')->createToken($headmasterfeza);
        app('auth.password.broker')->createToken($headmasterkigogoni);
        app('auth.password.broker')->createToken($headmasterkilimanjarot);
        app('auth.password.broker')->createToken($headmasteralihassanmwinyiislamic);
        app('auth.password.broker')->createToken($headmasteralliance);
    }
}

