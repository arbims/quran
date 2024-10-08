<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class PostsTable extends AbstractMigration
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
		$table = $this->table('posts');
		$table->addColumn('name', 'string', [
			'default' => null,
			'limit' => 255,
			'null' => false
		]);
		$table->addColumn('slug', 'string', [
			'default' => null,
			'limit' => 255,
			'null' => false
		]);
		$table->addColumn('image', 'string', [
			'default' => null,
			'limit' => 255,
			'null' => false
		]);
		$table->addColumn('description', 'text', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('online', 'integer');
		$table->addColumn('user_id', 'integer')->addIndex('user_id');
		$table->addColumn('created', 'datetime', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('modified', 'datetime', [
			'default' => null,
			'null' => false,
		]);
		$table->create();
	}
}
