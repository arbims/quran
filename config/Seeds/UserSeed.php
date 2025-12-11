<?php
declare(strict_types=1);

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Migrations\AbstractSeed;
use Migrations\BaseSeed;

/**
 * UserSeeder seed.
 */
class UserSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $table = $this->table('users');
    	$password = (new DefaultPasswordHasher())->hash('admin');
        $data = [
    	    'username' => 'admin',
    	    'email' => 'admin@gmail.com',
    	    'password' => $password,
    	    'confirmed' => 1,
    	    'role' => 'admin'
    	];
        $table->insert($data)->save();
    }
}
