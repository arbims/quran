<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Comments Model
 *
 * @method \App\Model\Entity\Comment newEmptyEntity()
 * @method \App\Model\Entity\Comment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Comment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Comment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CommentsTable extends Table
{
    public const COMMENTABLE_TYPE = ['post'];
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('comments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->allowEmptyString('username');

        $validator->add('email', 'email', [
            'rule' => 'email',
            'message' => 'Email invalide'
        ]);

        $validator
            ->scalar('content')
            ->allowEmptyString('content');

        $validator
            ->integer('commentable_id')
            ->allowEmptyString('commentable_id');

        $validator
            ->scalar('commentable_type')
            ->allowEmptyString('commentable_type');

        $validator
            ->integer('reply')
            ->notEmptyString('reply');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 255)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

        return $validator;
    }

    public function allFor($post_id, $post_type) {
        $records = $this->find()->where(['commentable_id' => $post_id , 'commentable_type' => $post_type])->order('created')->toArray();
        $comments = [];
        $by_id = [];
        foreach ($records as $record) {
            if ($record->reply) {
                $by_id[$record->reply]->replies[] = $record;
            } else {
                $record->replies = [];
                $by_id[$record->id] = $record;
                $comments[] = $record;
            }
        }
        return $comments;
    }

    public function isCommentable($commentable_id, $type) {
        $postsTable = TableRegistry::getTableLocator()->get('Posts');
        if (in_array($type, self::COMMENTABLE_TYPE)) {
            $record = $postsTable->find()->where(['id' => $commentable_id])->first();
            return $record;
        }
        return null;
    }
}
