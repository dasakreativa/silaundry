<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
  /**
   * Helper to assign data
   */
  private function assign($data)
  {
    foreach ($data as $value) {
      $assign = Permission::create(['name' => $value[0]]);
      if($value[1] == true){
        $assign->assignRole('admin');
      }
      if($value[2] == true){
        $assign->assignRole('outlet');
      }
    }
  }

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    # Create Role
    Role::create(['name' => 'admin']);
    Role::create(['name' => 'outlet']);
    Role::create(['name' => 'user']);

    # Create Permission Data
    $data = [
      ['outlet-list', true, true],
      ['outlet-add', true, true],
      ['outlet-view', true, true],
      ['outlet-delete', true, true],
      ['outlet-update', true, true],

      ['package-list', true, true],
      ['package-add', true, true],
      ['package-view', true, true],
      ['package-delete', true, true],
      ['package-update', true, true],

      ['order-list', true, true],
      ['order-add', true, true],
      ['order-view', true, true],
      ['order-delete', true, true],
      ['order-update', true, true],

      ['queue-list', true, true],
      ['queue-add', true, true],
      ['queue-view', true, true],
      ['queue-delete', true, true],
      ['queue-update', true, true],

      ['user-list', true, false],
      ['user-add', true, false],
      ['user-view', true, false],
      ['user-delete', true, false],
      ['user-update', true, false],

      ['bills', true, true],

      ['settings-main', true, false],
      ['settings-appearance', true, false],
      ['settings-mail', true, false],
    ];
    $this->assign($data);

    # Create Admin User
    File::cleanDirectory(public_path('uploads'));
    $faker = Faker::create('id_ID');
    $user  = User::create([
      'email'         => 'officialcakadi@gmail.com',
      'username'      => 'cakadi190',
      'fullname'      => 'Amir Zuhdi Wibowo',
      'password'      => bcrypt('@diboo190203'),
      'nik'           => 1234567890,
      'ktp_depan'     => $faker->image(public_path('uploads'), 720, 480, 'PG', false, true, 'Contoh KTP'),
      'foto'          => $faker->image(public_path('uploads'), 720, 720, 'PG', false, true, 'Contoh KTP'),
      'ktp_belakang'  => $faker->image(public_path('uploads'), 720, 480, 'PG', false, true, 'Contoh KTP'),
    ]);
    $user->assignRole('admin');

    # Create any user which one is admin, outlet or user
    User::factory(30)->create()->each(function($user) use ($faker) {
      $user->assignRole($faker->randomElement(['admin', 'outlet', 'user']));
    });
  }
}
