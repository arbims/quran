<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CommentsTable extends AbstractMigration
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
        $table = $this->table('comments');
        $table->addColumn('username', 'string', [
            'null' => true
        ]);
        $table->addColumn('email', 'string', [
            'null' => true
        ]);
        $table->addColumn('content', 'text', [
            'null' => true,
        ]);
        $table->addColumn('commentable_id', 'integer',['null' => true]);
        $table->addColumn('commentable_type','string', ['null' => false]);
        $table->addColumn('reply', 'integer', ['default' => 0]);
        $table->addColumn('ip', 'string', ['null' => false]);
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
