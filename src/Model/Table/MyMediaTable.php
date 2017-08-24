<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MyMedia Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Media
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\MyMedia get($primaryKey, $options = [])
 * @method \App\Model\Entity\MyMedia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MyMedia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MyMedia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MyMedia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MyMedia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MyMedia findOrCreate($search, callable $callback = null, $options = [])
 */
class MyMediaTable extends Table
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

        $this->table('my_media');
        $this->displayField('id');
        $this->primaryKey('id');

//        $this->belongsTo('Media', [
//            'foreignKey' => 'media_id'
//        ]);
//        $this->belongsTo('Users', [
//            'foreignKey' => 'user_id'
//        ]);

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
//        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
    
    public function saveMyMedia($data)
    {
        $media = $this->newEntity();
        $media->media_id = $data['media_id'];
        $media->media_type = $data['media_type'];
        $media->user_media_id = $data['user_id'];
        $result = $this->save($media);
        
        if($result){
            return $result;
        }   return false;
    }
}
