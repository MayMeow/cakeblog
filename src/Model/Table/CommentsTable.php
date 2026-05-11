<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comments Model
 *
 * @property \App\Model\Table\PostsTable&\Cake\ORM\Association\BelongsTo $Posts
 *
 * @method \App\Model\Entity\Comment newEmptyEntity()
 * @method \App\Model\Entity\Comment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Comment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Comment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Comment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Comment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Comment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CommentsTable extends Table
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

        $this->setTable('comments');
        $this->setDisplayField('author_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
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
            ->integer('post_id')
            ->notEmptyString('post_id');

        $validator
            ->scalar('author_name')
            ->maxLength('author_name', 255)
            ->requirePresence('author_name', 'create')
            ->notEmptyString('author_name');

        $validator
            ->email('author_email')
            ->maxLength('author_email', 255)
            ->allowEmptyArray('author_email');
            //  ->requirePresence('author_email', 'create')
            // ->notEmptyString('author_email');

        $validator
            ->scalar('author_website')
            ->maxLength('author_website', 255)
            ->allowEmptyString('author_website')
            ->urlWithProtocol('author_website');

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmptyString('body');

        $validator
            ->boolean('is_approved')
            ->notEmptyString('is_approved');

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
        $rules->add($rules->existsIn(['post_id'], 'Posts'), ['errorField' => 'post_id']);

        return $rules;
    }

    /**
     * Find only approved comments.
     */
    public function findApproved(SelectQuery $query): SelectQuery
    {
        return $query->where(['Comments.is_approved' => true])
            ->orderBy(['Comments.created' => 'ASC']);
    }

    /**
     * Find only pending (unapproved) comments.
     */
    public function findPending(SelectQuery $query): SelectQuery
    {
        return $query->where(['Comments.is_approved' => false])
            ->orderBy(['Comments.created' => 'DESC']);
    }
}
