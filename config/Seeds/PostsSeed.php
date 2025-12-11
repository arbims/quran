<?php
declare(strict_types=1);

use Migrations\BaseSeed;
use App\Utility\TextTools;

/**
 * Posts seed.
 */
class PostsSeed extends BaseSeed
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
        $faker = \Faker\Factory::create('ar_SA');
        $table = $this->table('posts');
        for ($i = 0; $i < 30; $i++) {
            $title = $faker->realText(20); // titre arabe court
            $data = [
                'name'        => $title,
                'slug'        => TextTools::arabicSlug($title),
                'description' => $faker->realText(2000), // texte arabe cohérent
                'image'       => 'https://picsum.photos/640/480?random='. $i,
                'online'      => true,
                'user_id'     => 1,
                'created'  => date('Y-m-d H:i:s'),
                'modified'  => date('Y-m-d H:i:s'),
            ];
            $table->insert($data)->save();
        }

    }
}
