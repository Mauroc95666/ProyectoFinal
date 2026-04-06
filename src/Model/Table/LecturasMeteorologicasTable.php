<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LecturasMeteorologicas Model
 *
 * @method \App\Model\Entity\LecturasMeteorologica newEmptyEntity()
 * @method \App\Model\Entity\LecturasMeteorologica newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\LecturasMeteorologica> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LecturasMeteorologica get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\LecturasMeteorologica findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\LecturasMeteorologica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\LecturasMeteorologica> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LecturasMeteorologica|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\LecturasMeteorologica saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\LecturasMeteorologica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LecturasMeteorologica>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LecturasMeteorologica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LecturasMeteorologica> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LecturasMeteorologica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LecturasMeteorologica>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LecturasMeteorologica>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LecturasMeteorologica> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LecturasMeteorologicasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('lecturas_meteorologicas');
        $this->setDisplayField('ubicacion');
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
            ->scalar('ubicacion')
            ->maxLength('ubicacion', 255)
            ->requirePresence('ubicacion', 'create')
            ->notEmptyString('ubicacion');

        $validator
            ->decimal('temperatura_actual')
            ->requirePresence('temperatura_actual', 'create')
            ->notEmptyString('temperatura_actual');

        $validator
            ->integer('humedad')
            ->requirePresence('humedad', 'create')
            ->notEmptyString('humedad');

        return $validator;
    }
}
