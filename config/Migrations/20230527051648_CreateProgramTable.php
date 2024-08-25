<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProgramTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('programs');
        $table->addColumn('title','string');
        $table->addColumn('slug','string');
        $table->addColumn('image','string', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('description','text');
        $table->addColumn('created', 'datetime', [
			'default' => null,
			'null' => true,
		]);
		$table->addColumn('modified', 'datetime', [
			'default' => null,
			'null' => true,
		]);
        $table->create();

        $table = $this->table('episodes');
        $table->addColumn('title','string');
        $table->addColumn('slug','string');
        $table->addColumn('youtube','string', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('description','text');
        $table->addColumn('online','integer');
        $table->addColumn('program_id','integer')->addForeignKey('program_id', 'programs', ['id']);
        $table->addColumn('created', 'datetime', [
			'default' => null,
			'null' => true,
		]);
		$table->addColumn('modified', 'datetime', [
			'default' => null,
			'null' => true,
		]);

        $table->create();
    }
}
