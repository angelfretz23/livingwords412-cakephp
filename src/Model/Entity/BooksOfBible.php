<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BooksOfBible Entity
 *
 * @property int $id
 * @property string $type
 * @property string $version
 * @property string $book_name
 * @property string $direction
 * @property int $bible_type_id
 *
 * @property \App\Model\Entity\BibleType $bible_type
 * @property \App\Model\Entity\ChapterNumberOfBook[] $chapter_number_of_book
 */
class BooksOfBible extends Entity
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
