<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blogs Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PostsTable&\Cake\ORM\Association\HasMany $Posts
 *
 * @method \App\Model\Entity\Blog newEmptyEntity()
 * @method \App\Model\Entity\Blog newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Blog> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Blog get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Blog findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Blog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Blog> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Blog|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Blog saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Blog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Blog>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Blog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Blog> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Blog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Blog>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Blog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Blog> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BlogsTable extends Table
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

        $this->setTable('blogs');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Posts', [
            'foreignKey' => 'blog_id',
        ]);
        $this->hasMany('Domains', [
            'foreignKey' => 'blog_id',
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
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('accent_color')
            ->maxLength('accent_color', 50)
            ->notEmptyString('accent_color');

        $validator
            ->boolean('is_public')
            ->notEmptyString('is_public');

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
        $rules->add($rules->isUnique(['slug']), ['errorField' => 'slug']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
