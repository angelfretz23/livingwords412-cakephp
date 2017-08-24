<?php
namespace App\Controller\Api;


use Cake\Network\Exception\BadRequestException;
use Cake\ORM\TableRegistry;

/**
 * News Controller
 * @property \App\Model\Table\MusicTable $Music
 * @property \App\Model\Table\TagScriptureTable $TagScripture
 * @property \App\Model\Table\SermonTable $Sermon
 * @property \App\Model\Table\MovieTable $Movie
 * @property \App\Model\Table\MovieVerseIdsTable $MovieVerseIds
 * @property \App\Model\Table\UploadVerseIdsTable $UploadVerseIds
 * @property \App\Model\Table\BookTable $Book
 */
class GetVerseDataController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadModel('Music');
        $this->loadModel('Book');
        $this->loadModel('Sermon');
        $this->loadModel('Movie');
        $this->loadModel('$MovieVerseIds');
        $this->loadModel('UploadVerseIds');
        $this->loadModel('TagScripture');
    }

    /**
     * @return \Cake\Network\Response|null
     * 
     * get data from movie, music, sermon according to verse id
     */
    public function getData(){
        if($this->request->is('post')) {
           $data = $this->request->data();
            $verse = $data['verse']; 

            $music = $this->Music->getData($verse);
            $sermon = $this->Sermon->getData($verse);
            $movie = $this->Movie->getData($verse);
            $book = $this->Book->getData($verse);

           $mainArr = $this->mergeArr($music, $sermon, $movie, $book);
//        return $this->jsonResponse($bibleType);
            return $this->jsonResponse($mainArr);
        }
        throw new BadRequestException;
    }

    /**
     * @param $music
     * @param $sermon
     * @param $movie
     * @return array
     * 
     * private method for merge three arrays
     */
    private function mergeArr($music, $sermon, $movie, $book)
    {
        $musicGeneral = ['music' => $music];
        $sermonGeneral = ['sermon' => $sermon];
        $movieGeneral = ['movie' => $movie];
        $bookGeneral = ['book' => $book];
        $mainArr = array_merge($musicGeneral, $sermonGeneral, $movieGeneral, $bookGeneral);
        return $mainArr;
    }

}