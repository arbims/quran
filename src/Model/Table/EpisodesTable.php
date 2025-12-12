<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use OpenApi\Attributes as OA;

/**
 * Episodes Model
 *
 * @property \App\Model\Table\ProgramsTable&\Cake\ORM\Association\BelongsTo $Programs
 *
 * @method \App\Model\Entity\Episode newEmptyEntity()
 * @method \App\Model\Entity\Episode newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Episode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Episode get($primaryKey, $options = [])
 * @method \App\Model\Entity\Episode findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Episode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Episode[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Episode|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Episode saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Episode[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Episode[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Episode[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Episode[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
#[OA\Schema(
    schema: 'EpisodesTable',
    type: 'array',
    items   : new OA\Items(
        properties: [
            new OA\Property(property: 'id', description: 'Identifiant unique de l\'episode', type: 'integer'),
            new OA\Property(property: 'title', description: 'title episode', type: 'string'),
            new OA\Property(property: 'slug', description: 'slug episode', type: 'string'),
            new OA\Property(property: 'youtube id', description: 'youtube Id', type: 'string'),
            new OA\Property(property: 'description', description: 'description episode', type: 'string'),
            new OA\Property(property: 'online', description: 'online episode', type: 'integer'),
            new OA\Property(property: 'created_at', description: 'yyyy-mm-dd hh:ii:ss category created', type: 'datetime'),
            new OA\Property(property: 'updated_at', description: 'yyyy-mm-dd hh:ii:ss category updated', type: 'datetime'),

        ])
)]
class EpisodesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('episodes');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Programs', [
            'foreignKey' => 'program_id',
            'joinType' => 'INNER',
        ]);
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('youtube')
            ->maxLength('youtube', 255)
            ->allowEmptyString('youtube');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('online')
            ->requirePresence('online', 'create')
            ->notEmptyString('online');

        $validator
            ->integer('program_id')
            ->requirePresence('program_id', 'create')
            ->notEmptyString('program_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('program_id', 'Programs'), ['errorField' => 'program_id']);

        return $rules;
    }

    public function findEpisodesProgram(int $idProgram): Query\SelectQuery
    {
        return $this->find()->where(['program_id' => $idProgram]);
    }
}
