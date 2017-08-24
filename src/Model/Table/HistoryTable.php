<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * History Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Media
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\History get($primaryKey, $options = [])
 * @method \App\Model\Entity\History newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\History[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\History|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\History patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\History[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\History findOrCreate($search, callable $callback = null, $options = [])
 */
class HistoryTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('history');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Music', [
            'foreignKey' => 'media_id'
        ]);
        $this->belongsTo('Movie', [
            'foreignKey' => 'media_id'
        ]);
        $this->belongsTo('Sermon', [
            'foreignKey' => 'media_id'
        ]);

        $this->belongsTo('Book', [
            'foreignKey' => 'media_id'
        ]);
//        $this->belongsTo('Users', [
//            'foreignKey' => 'id'
//        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('media_type');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
//        $rules->add($rules->existsIn(['media_id'], 'Media'));
//        $rules->add($rules->existsIn(['id'], 'Users'));
        return $rules;
    }

    public function saveHistory($data)
    {
        $history = $this->newEntity();
        $history->media_id = $data['media_id'];
        $history->media_type = $data['media_type'];
        $history->user_history_id = $data['user_id'];
        $result = $this->save($history);

        if($result){
            return $result;
        } return false;
    }
}
