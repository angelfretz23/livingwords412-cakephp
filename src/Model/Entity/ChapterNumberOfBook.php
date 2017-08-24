<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChapterNumberOfBook Entity
 *
 * @property int $id
 * @property int $books_of_bible_id
 * @property int $chapter
 *
 * @property \App\Model\Entity\BooksOfBible $books_of_bible
 */
class ChapterNumberOfBook extends Entity
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
