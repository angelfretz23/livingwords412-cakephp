<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sermon Entity
 *
 * @property int $id
 * @property string $pastor_name
 * @property string $semon_title
 * @property \Cake\I18n\Time $sermon_date
 * @property string $description
 * @property int $tag_id
 *
 * @property \App\Model\Entity\Tag $tag
 */
class Sermon extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
