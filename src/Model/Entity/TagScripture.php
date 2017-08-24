<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TagScripture Entity
 *
 * @property int $id
 * @property string $tag_scripture_name
 * @property int $id_of_verse
 * @property int $music_id
 *
 * @property \App\Model\Entity\Music $music
 */
class TagScripture extends Entity
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
