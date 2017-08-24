<?php
namespace App\Controller\Admin;
//namespace App\Controller;


use Cake\Core\Configure;
use Cake\Event\Event;
use App\Controller\Admin\HttpController;

/**
 * Class AdminController
 * @package App\Controller\Admin
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\AdministratorsTable $Administrators
 * @property \App\Model\Table\BooksOfBibleTable $BooksOfBible
 * @property \App\Model\Table\ChapterNumberOfBookTable $ChapterNumberOfBook
 * @property \App\Model\Table\BibleBookVerseTable $BibleBookVerse
 * @property \App\Model\Table\MovieTable $Movie
 * @property \App\Model\Table\MovieVerseIdsTable $MovieVerseIds
 * @property \App\Model\Table\MovieTagsTable $MovieTags
 * @property \App\Model\Table\MusicTable $Music
 * @property \App\Model\Table\TagScriptureTable $TagScripture
 * @property \App\Model\Table\MusicTagsTable $MusicTags
 * @property \App\Model\Table\SermonTable $Sermon
 * @property \App\Model\Table\UploadVerseIdsTable $UploadVerseIds
 * @property \App\Model\Table\TagsTable $Tags
 * @property \App\Model\Table\BookTable $Book
 * @property \App\Model\Table\BookTagsTable $BookTags
 * @property \App\Model\Table\TagBookScriptureTable $TagBookScripture
 * @property \App\Model\Table\VerseMediaTable $VerseMedia
 * @property \App\Model\Table\VerseMediaMusicTable $VerseMediaMusic
 * @property \App\Model\Table\VerseMediaSermonTable $VerseMediaSermon
 * @property \App\Model\Table\VerseMediaBookTable $VerseMediaBook
 */
class ManageController extends AppController {

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('BooksOfBible');
        $this->loadModel('Movie');
        $this->loadModel('Book');
        $this->loadModel('BookTags');
        $this->loadModel('TagBookScripture');
        $this->loadModel('Sermon');
        $this->loadModel('Music');
        $this->loadModel('UploadVerseIds');
        $this->loadModel('Tags');
        $this->loadModel('TagScripture');
        $this->loadModel('MusicTags');
        $this->loadModel('MovieTags');
        $this->loadModel('MovieVerseIds');
        $this->loadModel('BibleBookVerse');
        $this->loadModel('ChapterNumberOfBook');
        $this->loadComponent('Paginator');
        $this->loadModel('VerseMedia');
        $this->loadModel('VerseMediaMusic');
        $this->loadModel('VerseMediaSermon');
        $this->loadModel('VerseMediaBook');
    }

    public $paginate = [
        'limit' => 12,
        'order' => [
            'BooksOfBile.id' => 'asc'
        ]
    ];

    /**
     * @param $id
     *
     * set in session choosen user and get all bible books
     */
    public function firstStep($id)
    {
        $session = $this->request->session();
        $session->write('UserData.user_id', $id);
        $books = $this->paginate('BooksOfBible');
        $this->set('books', $books);
    }





    public function selectMediaType()
    {
        $books = $this->paginate('BooksOfBible');
        $this->set('books', $books);
    }

    public function fillTheForm()
    {
        if ($this->request->is('post')){
            $data = $this->request->data();
            $mediaType = $data['media_type'];
            $this->set('mediaType', $mediaType);
        }
    }

    public function choosebook()
    {
        $books = $this->paginate('BooksOfBible');
        $this->set('books', $books);
    }

    public function choosebookMultiply()
    {
        $books = $this->BooksOfBible->find();
        $this->set('books', $books);
    }

    public function choosechapter($bookId)
    {
        $chaptersOfBook = $this->ChapterNumberOfBook->find()->where(['books_of_bible_id' => $bookId])->toArray();
        $this->set('chaptersOfBook', $chaptersOfBook);
    }

    public function choosechapterAjax()
    {
        if ($this->request->is('post')) {
            $this->autoRender = false;
            $this->response->type('json');

            $data = $this->request->data();
            $booksIDArray = explode(" ", $data["bookIDString"]);
            $booksIDArrayClear = array_diff($booksIDArray, array(''));
            $chaptersOfBook = $this->ChapterNumberOfBook->find()->where(['books_of_bible_id IN' => $booksIDArrayClear])->toArray();
            $this->response->body(json_encode($chaptersOfBook));
        }
    }

    public function chooseversus($chapterId)
    {
        $chapterVerses = $this->BibleBookVerse->find()->select(['id','verse'])->where(['chapter_id' => $chapterId])->toArray();
        $this->set('chapterVerses', $chapterVerses);
    }

    public function chooseversusAjax()
    {
        if ($this->request->is('post')) {
            $this->autoRender = false;
            $this->response->type('json');

            $data = $this->request->data();
            $chapterIDArray = explode(" ", $data["chapterIDString"]);
            $booksIDArrayClear = array_diff($chapterIDArray, array('', 'undefined'));

            $chapterVerses = $this->BibleBookVerse->find()->select(['id','verse'])->where(['chapter_id IN' => $booksIDArrayClear])->toArray();
            $this->response->body(json_encode($chapterVerses));
        }
    }

    public function saveChosenVerses()
    {
        if ($this->request->is('post')) {
            $data = $this->request->data();
            $arrVerseIds = $data['arrayOfVerseIds'];
            $session = $this->request->session();
            $user_seversus = $session->read('UserData.user_seversus');

            if($user_seversus){
                $tepmA = $session->read('UserData.user_seversus');
                if($arrVerseIds){
                    foreach ($arrVerseIds as $arrVerseId){
                        array_push($tepmA, $arrVerseId);
                    }
                    $result = array_unique($tepmA);
                    $session->write('UserData.user_seversus', $result);
                }

            }else{
                $session->write('UserData.user_seversus', $arrVerseIds);
            }
         }
    }

    public function saveseversus()
    {
        if ($this->request->is('post')) {
            $data = $this->request->data();
            $session = $this->request->session();
            $arrVerseIds = $session->read('UserData.user_seversus');

            $selected_verses = [];
            $data_books = [];
            $data_movie = [];
            $data_sermons = [];
            $data_musics = [];
            foreach ($arrVerseIds as $verse) {
                $verse = $this->BibleBookVerse->find()->select(['id', 'verse'])->where(['id' => $verse])->toArray();
                array_push($selected_verses, $verse);
            }

            foreach ($arrVerseIds as $verse) {
                $booksID = $this->TagBookScripture->find()->where(['verse_id_each' => $verse])->toArray();
                $tags = [];
                foreach ($booksID as $bookId) {
                        /*$findTags = $this->BookTags->find()->where(['book_id' => $bookId->book_id, 'verse_id IN'=> ['0', $verse]])->toArray();*/
                        $findTags = $this->BookTags->find()->where(['book_id' => $bookId->book_id, 'verse_id'=> $verse])->toArray();
                        foreach ($findTags as $tag){
                            array_push($tags, array(
                                'tag' => $tag->tag_name,
                                'book_id' => $bookId->book_id
                            ));
                        }
                    }
                    array_push($data_books, $tags);
                }

            foreach ($arrVerseIds as $verse) {
                $moviesID = $this->MovieVerseIds->find()->where(['verse_id_each' => $verse])->toArray();
                $tags = [];
                foreach ($moviesID as $movieID){
                        /*$findTags = $this->MovieTags->find()->where(['movie_id' => $movieID->movie_id, 'verse_id IN'=> ['0', $verse]])->toArray();*/
                        $findTags = $this->MovieTags->find()->where(['movie_id' => $movieID->movie_id, 'verse_id'=> $verse])->toArray();
                        foreach ($findTags as $tag){
                            array_push($tags, array(
                                'tag' => $tag->tag_name,
                                'movie_id' => $movieID->movie_id
                            ));
                        }
                    }
                array_push($data_movie, $tags);
            }


            foreach ($arrVerseIds as $verse) {
                $sermonsID = $this->UploadVerseIds->find()->where(['verse_id_each' => $verse])->toArray();
                $tags = [];
                foreach ($sermonsID as $sermonID){
                  /*  $findTags = $this->Tags->find()->where(['sermon_id' => $sermonID->sermon_id, 'verse_id IN'=> ['0', $verse]])->toArray();*/
                    $findTags = $this->Tags->find()->where(['sermon_id' => $sermonID->sermon_id, 'verse_id'=>  $verse])->toArray();
                    foreach ($findTags as $tag){
                        array_push($tags, array(
                            'tag' => $tag->tag_name,
                            'sermon_id' => $sermonID->sermon_id
                        ));
                    }
                }
                array_push($data_sermons, $tags);
            }

            foreach ($arrVerseIds as $verse) {
                $musicsID = $this->TagScripture->find()->where(['id_of_verse' => $verse])->toArray();
                $tags = [];
                foreach ($musicsID as $musicID){
            /*        $findTags = $this->MusicTags->find()->where(['music_id' => $musicID->music_id, 'verse_id IN'=> ['0', $verse]])->toArray();*/
                    $findTags = $this->MusicTags->find()->where(['music_id' => $musicID->music_id, 'verse_id'=> $verse])->toArray();
                    foreach ($findTags as $tag){
                        array_push($tags, array(
                            'tag' => $tag->tag_name,
                            'music_id' => $musicID->music_id
                        ));
                    }
                }
                array_push($data_musics, $tags);
            }

        }
        // data - array of unique tags
        $dataTags = [];
        for ($i = 0; $i < count($selected_verses); $i++){
            $tempDataForOneVerse = [];

            for ($j = 0; $j < count($data_books[$i]); $j++ ){
                array_push($tempDataForOneVerse, $data_books[$i][$j]['tag']);
            }

            for ($j = 0; $j < count($data_movie[$i]); $j++ ){
                array_push($tempDataForOneVerse, $data_movie[$i][$j]['tag']);
            }

            for ($j = 0; $j < count($data_sermons[$i]); $j++ ){
                array_push($tempDataForOneVerse, $data_sermons[$i][$j]['tag']);
            }

            for ($j = 0; $j < count($data_musics[$i]); $j++ ){
                array_push($tempDataForOneVerse, $data_musics[$i][$j]['tag']);
            }
            $uniqueTags = array_unique($tempDataForOneVerse);
            array_push($dataTags, $uniqueTags);
        }

        $this->set('selectedVerses',$selected_verses);
        $this->set('verseTag',$dataTags);

        /*$this->set('dataBooks',$data_books);
        $this->set('dataMovie',$data_movie);
        $this->set('dataSermons',$data_sermons);
        $this->set('dataMusics',$data_musics);*/
    }

    public function clearSelectedVerses(){
        if ($this->request->is('post')) {
            $session = $this->request->session();
            $session->write('UserData.user_seversus', null);
            $session->write('UserData.user_verse_tags', null);
        }
    }

    public function havesaved()
    {
        if ($this->request->is('post')) {
            $data = $this->request->data();
            $arrayVerseID = $data['VerseID'];
            $arrayVerseTags = $data['VerseTags'];

            $session = $this->request->session();
            $session->write('UserData.user_verse_tags', $arrayVerseTags);
        }
    }

    public function selectedVersus()
    {

    }

    public function saveMediaAdmin()
    {
        if ($this->request->is('post')){
            $data = $this->request->data();
            $mediaType = $data['media_type'];

            if($mediaType == 'movie'){
                $this->saveMovieInDbAdmin($data);
            }else if ($mediaType == 'music'){
                $this->saveMusicInDbAdmin($data);
            }elseif ($mediaType == 'sermon'){
                $this->saveSermonInDbAdmin($data);
            }elseif ($mediaType == 'book'){
                $this->saveBookInDbAdmin($data);
            }
        }
    }


    private function saveBookInDbAdmin($data)
    {
        $session = $this->request->session();
        $user_seversus =$session->read('UserData.user_seversus');

        $book = $this->Book->newEntity();
        $book->book_name = $data['book_name'];
        $book->description = $data['description'];
        $book->author_name = $data['author_name'];
        $book->book_date = $data['book_date'];
        $book->media_link = $data['media_link'];
        $book->tags = $data['tags'];

        $book->user_id = 'admin';
        $result = $this->Book->save($book);

        if ($result){
            $moveFile = 0;
            $fileName = '';
            $uploadPath = '';
            if(!empty($data['file']['name'])){
                $fileName = $data['file']['name'];
                $mediaId = $this->VerseMediaBook->find()->select(['id'])->order(['id' => 'DESC'])->toArray();
                $mediaIdLast = $mediaId[0]->id || 0;
                $newFileName = $mediaIdLast + 1;
                $fileNameArray = explode(".", $fileName);
                $fileNameArray[0] = $newFileName;
                $data['file']['name'] = implode(".", $fileNameArray);
                $fileName = $data['file']['name'];

                $uploadPath = 'uploads/files/book/';
                $uploadFile = $uploadPath.$fileName;
                $moveFile = move_uploaded_file($data['file']['tmp_name'],$uploadFile);
            }

            foreach ($user_seversus as $book_id) {
                $bookVerseIds = $this->TagBookScripture->newEntity();
                $bookVerseIds->book_id = $result->id;
                $bookVerseIds->verse_id_each = $book_id;
                $this->TagBookScripture->save($bookVerseIds);

                if($moveFile){
                    $verseMedia = $this->VerseMediaBook->newEntity();
                    $verseMedia->name = $fileName;
                    $verseMedia->path = $uploadPath;
                    $verseMedia->file_extention = $data['file']['type'];
                    $verseMedia->id_of_verse = $book_id;
                    $verseMedia->book_id = $result->id;
                    $this->VerseMediaBook->save($verseMedia);
                }
            }
            $tags = explode(',',$data['tags']);
            foreach ($tags as $tag) {
//                var_dump($tag);die();
                $bookTags = $this->BookTags->newEntity();
                $bookTags->book_id = $result->id;
                $bookTags->tag_name = $tag;
                $this->BookTags->save($bookTags);
            }

            // saving the tags for define verse
            $verseTags =$data['VerseTags'];
            for($i = 0; $i < count($user_seversus); $i++){
                $tags = explode(',',$verseTags[$i]);
                foreach ($tags as $tag) {
                    if(!empty($tag)){
                        $movieTags = $this->BookTags->newEntity();
                        $movieTags->book_id = $result->id;
                        $movieTags->tag_name = $tag;
                        $movieTags->verse_id = $user_seversus[$i];
                        $this->BookTags->save($movieTags);
                    }
                }
            }

            $session->write('UserData.user_seversus', null);
            $session->write('UserData.user_verse_tags', null);

            $this->Flash->success('The book saved');
            $this->redirect('/admin/users/manage');
        }
    }

    private function saveSermonInDbAdmin($data)
    {
        $session = $this->request->session();
        $user_seversus =$session->read('UserData.user_seversus');

        $music = $this->Sermon->newEntity();
        $music->semon_title = $data['sermon_title'];
        $music->description = $data['description'];
        $music->pastor_name = $data['pastor_name'];
        $music->church_name = $data['church_name'];
        $music->sermon_date = $data['sermon_date'];
        $music->media_url = $data['media_url'];
        $music->tags = $data['tags'];

        $music->user_id = 'admin';
        $result = $this->Sermon->save($music);

        if ($result){
            $moveFile = 0;
            $fileName = '';
            $uploadPath = '';
            if(!empty($data['file']['name'])){
                $fileName = $data['file']['name'];
                $mediaId = $this->VerseMediaSermon->find()->select(['id'])->order(['id' => 'DESC'])->toArray();
                $mediaIdLast = $mediaId[0]->id || 0;
                $newFileName = $mediaIdLast + 1;
                $fileNameArray = explode(".", $fileName);
                $fileNameArray[0] = $newFileName;
                $data['file']['name'] = implode(".", $fileNameArray);
                $fileName = $data['file']['name'];

                $uploadPath = 'uploads/files/sermon/';
                $uploadFile = $uploadPath.$fileName;
                $moveFile = move_uploaded_file($data['file']['tmp_name'],$uploadFile);
            }

            foreach ($user_seversus as $music_id) {
                $sermonVerseIds = $this->UploadVerseIds->newEntity();
                $sermonVerseIds->sermon_id = $result->id;
                $sermonVerseIds->verse_id_each = $music_id;
                $this->UploadVerseIds->save($sermonVerseIds);

                if($moveFile){
                    $verseMedia = $this->VerseMediaSermon->newEntity();
                    $verseMedia->name = $fileName;
                    $verseMedia->path = $uploadPath;
                    $verseMedia->file_extention = $data['file']['type'];
                    $verseMedia->id_of_verse = $music_id;
                    $verseMedia->sermon_id = $result->id;
                    $this->VerseMediaSermon->save($verseMedia);
                }
            }
            $tags = explode(',',$data['tags']);
            foreach ($tags as $tag) {
//                var_dump($tag);die();
                $sermonTags = $this->Tags->newEntity();
                $sermonTags->sermon_id = $result->id;
                $sermonTags->tag_name = $tag;
                $this->Tags->save($sermonTags);
            }

            // saving the tags for define verse
            $verseTags =$data['VerseTags'];
            for($i = 0; $i < count($user_seversus); $i++){
                $tags = explode(',',$verseTags[$i]);
                foreach ($tags as $tag) {
                    if(!empty($tag)){
                        $movieTags = $this->Tags->newEntity();
                        $movieTags->sermon_id = $result->id;
                        $movieTags->tag_name = $tag;
                        $movieTags->verse_id = $user_seversus[$i];
                        $this->Tags->save($movieTags);
                    }
                }
            }

            $session->write('UserData.user_seversus', null);
            $session->write('UserData.user_verse_tags', null);

            $this->Flash->success('The sermon saved');
            $this->redirect('/admin/users/manage');
        }
    }

    private function saveMovieInDbAdmin($data)
    {
        $session = $this->request->session();
        $user_seversus =$session->read('UserData.user_seversus');

        $movie = $this->Movie->newEntity();
        $movie->movie_name = $data['movie_name'];
        $movie->description = $data['description'];
        $movie->director = $data['director_name'];
        $movie->actors = $data['actor_name'];
        $movie->release_date = $data['release_date'];
        $movie->movie_link = $data['media_link'];
        $movie->tags = $data['tags'];

        $movie->user_id = 'admin';
        $result = $this->Movie->save($movie);

        if ($result){

            $moveFile = 0;
            $fileName = '';
            $uploadPath = '';
            if(!empty($data['file']['name'])){
                $fileName = $data['file']['name'];
                $mediaId = $this->VerseMedia->find()->select(['id'])->order(['id' => 'DESC'])->toArray();
                $mediaIdLast = $mediaId[0]->id;
                $newFileName = $mediaIdLast + 1;
                $fileNameArray = explode(".", $fileName);
                $fileNameArray[0] = $newFileName;
                $data['file']['name'] = implode(".", $fileNameArray);
                $fileName = $data['file']['name'];

                $uploadPath = 'uploads/files/';
                $uploadFile = $uploadPath.$fileName;
                $moveFile = move_uploaded_file($data['file']['tmp_name'],$uploadFile);
            }

            foreach ($user_seversus as $media_id) {
                $movieVerseIds = $this->MovieVerseIds->newEntity();
                $movieVerseIds->movie_id = $result->id;
                $movieVerseIds->verse_id_each = $media_id;
                $this->MovieVerseIds->save($movieVerseIds);

                //uploadFiles
                if($moveFile){
                        $verseMedia = $this->VerseMedia->newEntity();
                        $verseMedia->name = $fileName;
                        $verseMedia->path = $uploadPath;
                        $verseMedia->file_extention = $data['file']['type'];
                        $verseMedia->id_of_verse = $media_id;
                        $verseMedia->movie_id = $result->id;
                        $this->VerseMedia->save($verseMedia);
                    }
                }
            }

            $tags = explode(',',$data['tags']);
            foreach ($tags as $tag) {
                $movieTags = $this->MovieTags->newEntity();
                $movieTags->movie_id = $result->id;
                $movieTags->tag_name = $tag;
                $this->MovieTags->save($movieTags);
            }

            // saving the tags for define verse
           /* $verseTags =$session->read('UserData.user_verse_tags');*/
            $verseTags =$data['VerseTags'];
            for($i = 0; $i < count($user_seversus); $i++){
                $tags = explode(',',$verseTags[$i]);
                foreach ($tags as $tag) {
                    if(!empty($tag)){
                        $movieTags = $this->MovieTags->newEntity();
                        $movieTags->movie_id = $result->id;
                        $movieTags->tag_name = $tag;
                        $movieTags->verse_id = $user_seversus[$i];
                        $this->MovieTags->save($movieTags);
                    }
                }
            }

            $session->write('UserData.user_seversus', null);
            $session->write('UserData.user_verse_tags', null);

            $this->Flash->success('The movie saved');
            $this->redirect('/admin/users/manage');
        }





    private function saveMusicInDbAdmin($data)
    {
        $session = $this->request->session();
        $user_seversus =$session->read('UserData.user_seversus');

        $music = $this->Music->newEntity();
        $music->song_name = $data['song_name'];
        $music->relevant_lyrics = $data['relevant_lyrics'];
        $music->artist_name = $data['artist_name'];
        $music->writer_name = $data['writer_name'];
        $music->song_story = $data['song_story'];
        $music->media_url = $data['media_link'];
        $music->release_date = $data['release_date'];
        $music->album = $data['album'];
        $music->tags = $data['tags'];
        $music->user_id = 000;

        $result = $this->Music->save($music);


        if ($result){
            $moveFile = 0;
            $fileName = '';
            $uploadPath = '';
            if(!empty($data['file']['name'])){
                $fileName = $data['file']['name'];
                $mediaId = $this->VerseMediaMusic->find()->select(['id'])->order(['id' => 'DESC'])->toArray();
                $mediaIdLast = $mediaId[0]->id;
                $newFileName = $mediaIdLast + 1;
                $fileNameArray = explode(".", $fileName);
                $fileNameArray[0] = $newFileName;
                $data['file']['name'] = implode(".", $fileNameArray);
                $fileName = $data['file']['name'];
                $uploadPath = 'uploads/files/music/';
                $uploadFile = $uploadPath.$fileName;
                $moveFile = move_uploaded_file($data['file']['tmp_name'],$uploadFile);
            }

            foreach ($user_seversus as $music_id) {
                $musicVerseIds = $this->TagScripture->newEntity();
                $musicVerseIds->music_id = $result->id;
                $musicVerseIds->id_of_verse = $music_id;
                $this->TagScripture->save($musicVerseIds);
                //uploadFiles
                if($moveFile){
                    $verseMedia = $this->VerseMediaMusic->newEntity();
                    $verseMedia->name = $fileName;
                    $verseMedia->path = $uploadPath;
                    $verseMedia->file_extention = $data['file']['type'];
                    $verseMedia->id_of_verse = $music_id;
                    $verseMedia->music_id = $result->id;
                    $this->VerseMediaMusic->save($verseMedia);
                }
            }
            $tags = explode(',',$data['tags']);
            foreach ($tags as $tag) {
//                var_dump($tag);die();
                $musicTags = $this->MusicTags->newEntity();
                $musicTags->music_id = $result->id;
                $musicTags->tag_name = $tag;
                $this->MusicTags->save($musicTags);
            }

            // saving the tags for define verse
            $verseTags =$data['VerseTags'];
            for($i = 0; $i < count($user_seversus); $i++){
                $tags = explode(',',$verseTags[$i]);
                foreach ($tags as $tag) {
                    if(!empty($tag)){
                        $movieTags = $this->MusicTags->newEntity();
                        $movieTags->music_id = $result->id;
                        $movieTags->tag_name = $tag;
                        $movieTags->verse_id = $user_seversus[$i];
                        $this->MusicTags->save($movieTags);
                    }
                }
            }
            $session->write('UserData.user_seversus', null);
            $session->write('UserData.user_verse_tags', null);

            $this->Flash->success('The music saved');
            $this->redirect('/admin/users/manage');

        }
    }

    public function seeVersusContent($id)
    {
        $booksID = $this->TagBookScripture->find()->where(['verse_id_each' => $id])->toArray();
        $books = [];
        foreach ($booksID as $bookId){
            $book = $this->Book->find()->where(['id' => $bookId->book_id])->toArray();

            if (!empty($book)) {
                $findTags = $this->BookTags->find()->where(['book_id' => $bookId->book_id, 'verse_id IN'=> ['0', $id]])->toArray();
                array_push($book, $findTags);
                $bookFileQ = $this->VerseMediaBook->find()->where(['book_id' => $bookId->book_id, 'id_of_verse'=> $id])->toArray();
                if(!empty($bookFileQ)){
                    array_push($book, $bookFileQ);
                }
                array_push($books, $book);
            }
        }


        $sermonsID = $this->UploadVerseIds->find()->where(['verse_id_each' => $id])->toArray();
        $sermons = [];
        foreach ($sermonsID as $sermonId){
            $sermon = $this->Sermon->find()->where(['id' => $sermonId->sermon_id])->toArray();
            if (!empty($sermon)) {
                $findTags = $this->Tags->find()->where(['sermon_id' => $sermonId->sermon_id, 'verse_id IN'=> ['0', $id]])->toArray();
                array_push($sermon, $findTags);
                $sermonFileQ = $this->VerseMediaSermon->find()->where(['sermon_id' => $sermonId->sermon_id, 'id_of_verse'=> $id])->toArray();
                if(!empty($sermonFileQ)){
                    array_push($sermon, $sermonFileQ);
                }
                array_push($sermons, $sermon);
            }
        }

        $musicsID = $this->TagScripture->find()->where(['id_of_verse' => $id])->toArray();
        $musics = [];
        foreach ($musicsID as $musicID){
            $music = $this->Music->find()->where(['id' => $musicID->music_id])->toArray();
            if (!empty($music)) {
                $findTags = $this->MusicTags->find()->where(['music_id' => $musicID->music_id, 'verse_id IN'=> ['0', $id]])->toArray();
                array_push($music, $findTags);
                $musicFileQ = $this->VerseMediaMusic->find()->where(['music_id' => $musicID->music_id, 'id_of_verse'=> $id])->toArray();
                if(!empty($musicFileQ)){
                    array_push($music, $musicFileQ);
                }
                array_push($musics, $music);
            }
        }

        $moviesID = $this->MovieVerseIds->find()->where(['verse_id_each' => $id])->toArray();
        $movies = [];
        foreach ($moviesID as $movieID){
            $movie = $this->Movie->find()->where(['id' => $movieID->movie_id])->toArray();
            if (!empty($movie)) {
                $movieTags = $this->MovieTags->find()->where(['movie_id' => $movieID->movie_id, 'verse_id IN'=> ['0', $id]])->toArray();
                array_push($movie, $movieTags);
                $movieFileQ = $this->VerseMedia->find()->where(['movie_id' => $movieID->movie_id, 'id_of_verse'=> $id])->toArray();
                if(!empty($movieFileQ)){
                    array_push($movie, $movieFileQ);
                }
                array_push($movies, $movie);
            }
        }

        $this->set('books', $books);
        $this->set('sermon', $sermons);
        $this->set('music', $musics);
        $this->set('movie', $movies);
        $this->set('versusID', $id);
    }


    public function deleteBookAdmin($id, $versusID)
    {
        $adm = $this->Book->get($id);
        if($this->Book->delete($adm)){
            $this->redirect('/admin/see-versus-content/'.$versusID);
        }
    }

    /**
     * @param $id
     *
     * delete sermon
     */
    public function deleteSermonAdmin($id,$versusID)
    {
        $adm = $this->Sermon->get($id);
        if($this->Sermon->delete($adm)){
            $this->redirect('/admin/see-versus-content/'.$versusID);
        }
    }

    /**
     * @param $id
     *
     * delete music
     */
    public function deleteMusicAdmin($id,$versusID)
    {
        $adm = $this->Music->get($id);
        if($this->Music->delete($adm)){
            $this->redirect('/admin/see-versus-content/'.$versusID);
        }
    }

    /**
     * @param $id
     *
     * delete movie
     */
    public function deleteMovieAdmin($id, $versusID)
    {
        $adm = $this->Movie->get($id);
        if($this->Movie->delete($adm)){
            $this->redirect('/admin/see-versus-content/'.$versusID);
        }
    }

    public function deleteTag()
    {
        if($this->request->is('post')){
            $data = $this->request->data();
            if($data['typeTag'] === 'book') $table = 'BookTags';
            if($data['typeTag'] === 'sermon') $table = 'Tags';
            if($data['typeTag'] === 'music') $table = 'MusicTags';
            if($data['typeTag'] === 'movie') $table = 'MovieTags';
            $tagId = $data['tagId'];
            $tag = $this->$table->get($tagId);
            if($this->$table->delete($tag)){
                return true;
            }
        }
        return false;
    }

    public function lookFile($id, $type){
        if($type === 'movie') $FileQ = $this->VerseMedia->find()->where(['id' => $id])->toArray();
        if($type === 'book') $FileQ = $this->VerseMediaBook->find()->where(['id' => $id])->toArray();
        if($type === 'sermon') $FileQ = $this->VerseMediaSermon->find()->where(['id' => $id])->toArray();
        if($type === 'music') $FileQ = $this->VerseMediaMusic->find()->where(['id' => $id])->toArray();

        $this->set('fileData', $FileQ);
    }


    public function deleteFile(){
        if($this->request->is('post')){
            $data = $this->request->data();
            if($data['typeMedia'] === 'book') {$table = 'VerseMediaBook';  $field = 'book_id';}
            if($data['typeMedia'] === 'sermon') {$table = 'VerseMediaSermon';$field = 'sermon_id';}
            if($data['typeMedia'] === 'music') {$table = 'VerseMediaMusic';$field = 'music_id';}
            if($data['typeMedia'] === 'movie') {$table = 'VerseMedia';$field = 'movie_id';}
            $fileTypeId = $data['fileTypeId'];
            $verseID = $data['verseID'];
            $fileArray = $this->$table->find()->where([$field => $fileTypeId, 'id_of_verse' => $verseID])->toArray();
            foreach($fileArray as $file){
                $getFile= $this->$table->get($file->id);
                if($this->$table->delete($getFile)){
                    return true;
                }
            }

        }
        return false;
    }

    /**
     * @param $bookId
     *
     * get chapter accordion to selected book
     */
    public function secondStep($bookId)
    {
        $chaptersOfBook = $this->ChapterNumberOfBook->find()->where(['books_of_bible_id' => $bookId])->toArray();
        $this->set('chaptersOfBook', $chaptersOfBook);
    }

    /**
     * @param $chapterId
     *
     * select verses according to selected chapter
     */
    public function thirtStep($chapterId)
    {
        $chapterVerses = $this->BibleBookVerse->find()->select(['id','verse'])->where(['chapter_id' => $chapterId])->toArray();
        $this->set('chapterVerses', $chapterVerses);
    }

    /**
     * set media type and array of verse ids
     */
    public function fourthStep()
    {
        if ($this->request->is('post')){
            $data = $this->request->data();
            $mediaType = $data['media_type'];
            $arrVerseIds = $data['arrayOfVerseIds'];
            $this->set('mediaType', $mediaType);
            $this->set('arrVerseIds', $arrVerseIds);
        }
    }

    /**
     * general method to save media according to selected media_type
     */
    public function saveMedia()
    {
        if ($this->request->is('post')){
            $data = $this->request->data();
            $mediaType = $data['media_type'];
            $session = $this->request->session();
            $userId =$session->read('UserData.user_id');

            if($mediaType == 'movie'){
              $this->saveMovieInDb($data, $userId);
            }elseif ($mediaType == 'music'){
                $this->saveMusicInDb($data, $userId);
            }elseif ($mediaType == 'sermon'){
                $this->saveSermonInDb($data, $userId);
            }elseif ($mediaType == 'book'){
                $this->saveBookInDb($data, $userId);
            }
        }
    }

    /**
     * @param $data
     * @param $userId
     *
     * save movie
     */
    private function saveMovieInDb($data, $userId)
    {
        $movie = $this->Movie->newEntity();
        $movie->movie_name = $data['movie_name'];
        $movie->description = $data['description'];
        $movie->director = $data['director_name'];
        $movie->actors = $data['actor_name'];
        $movie->release_date = $data['release_date'];
        $movie->movie_link = $data['media_link'];
        $movie->tags = $data['tags'];

        $movie->user_id = $userId;
        $result = $this->Movie->save($movie);

        if ($result){
            foreach ($data['media_ids'] as $media_id) {
                $movieVerseIds = $this->MovieVerseIds->newEntity();
                $movieVerseIds->movie_id = $result->id;
                $movieVerseIds->verse_id_each = $media_id;
                $this->MovieVerseIds->save($movieVerseIds);
            }
            $tags = explode(',',$data['tags']);
            foreach ($tags as $tag) {
                $movieTags = $this->MovieTags->newEntity();
                $movieTags->movie_id = $result->id;
                $movieTags->tag_name = $tag;
                $this->MovieTags->save($movieTags);
            }
            $this->Flash->success('The movie saved');
            $this->redirect('/admin/users/manage');

        }
    }

    /**
     * @param $data
     * @param $userId
     *
     * save music
     */
    private function saveMusicInDb($data, $userId)
    {
        $music = $this->Music->newEntity();
        $music->song_name = $data['song_name'];
        $music->relevant_lyrics = $data['relevant_lyrics'];
        $music->artist_name = $data['artist_name'];
        $music->writer_name = $data['writer_name'];
        $music->song_story = $data['song_story'];
        $music->media_url = $data['media_link'];
        $music->release_date = $data['release_date'];
        $music->album = $data['album'];
        $music->tags = $data['tags'];
        $music->user_id = $userId;
        $result = $this->Music->save($music);

        if ($result){
            foreach ($data['media_ids'] as $music_id) {
                $musicVerseIds = $this->TagScripture->newEntity();
                $musicVerseIds->music_id = $result->id;
                $musicVerseIds->id_of_verse = $music_id;
                $this->TagScripture->save($musicVerseIds);
            }
            $tags = explode(',',$data['tags']);
            foreach ($tags as $tag) {
                $musicTags = $this->MusicTags->newEntity();
                $musicTags->music_id = $result->id;
                $musicTags->tag_name = $tag;
                $this->MusicTags->save($musicTags);
            }
            $this->Flash->success('The music saved');
            $this->redirect('/admin/users/manage');

        }
    }

    /**
     * @param $data
     * @param $userId
     *
     * save sermon
     */
    private function saveSermonInDb($data, $userId)
    {
        $music = $this->Sermon->newEntity();
        $music->semon_title = $data['sermon_title'];
        $music->description = $data['description'];
        $music->pastor_name = $data['pastor_name'];
        $music->church_name = $data['church_name'];
        $music->sermon_date = $data['sermon_date'];
        $music->media_url = $data['media_url'];
        $music->tags = $data['tags'];

        $music->user_id = $userId;
        $result = $this->Sermon->save($music);

        if ($result){
            foreach ($data['media_ids'] as $music_id) {
                $sermonVerseIds = $this->UploadVerseIds->newEntity();
                $sermonVerseIds->sermon_id = $result->id;
                $sermonVerseIds->verse_id_each = $music_id;
                $this->UploadVerseIds->save($sermonVerseIds);
            }
            $tags = explode(',',$data['tags']);
            foreach ($tags as $tag) {
                $sermonTags = $this->Tags->newEntity();
                $sermonTags->sermon_id = $result->id;
                $sermonTags->tag_name = $tag;
                $this->Tags->save($sermonTags);
            }
            $this->Flash->success('The sermon saved');
            $this->redirect('/admin/users/manage');
        }
    }

    /**
     * @param $data
     * @param $userId
     *
     * save book
     */
    private function saveBookInDb($data, $userId)
    {
        $book = $this->Book->newEntity();
        $book->book_name = $data['book_name'];
        $book->description = $data['description'];
        $book->author_name = $data['author_name'];
        $book->book_date = $data['book_date'];
        $book->media_link = $data['media_link'];
        $book->tags = $data['tags'];

        $book->user_id = $userId;
        $result = $this->Book->save($book);

        if ($result){
            foreach ($data['media_ids'] as $book_id) {
                $bookVerseIds = $this->TagBookScripture->newEntity();
                $bookVerseIds->book_id = $result->id;
                $bookVerseIds->verse_id_each = $book_id;
                $this->TagBookScripture->save($bookVerseIds);
            }
            $tags = explode(',',$data['tags']);
            foreach ($tags as $tag) {
                $bookTags = $this->BookTags->newEntity();
                $bookTags->book_id = $result->id;
                $bookTags->tag_name = $tag;
                $this->BookTags->save($bookTags);
            }
            $this->Flash->success('The book saved');
            $this->redirect('/admin/users/manage');
        }
    }

    /**
     * @param $id
     *
     * general method to edit data
     */
    public function editData($id)
    {

        $session = $this->request->session();
        $session->write('UserDataEdit.user_id', $id);
        $books = $this->Book->find()->where(['user_id' => $id])->toArray();
        $sermon = $this->Sermon->find()->where(['user_id' => $id])->toArray();
        $music = $this->Music->find()->where(['user_id' => $id])->toArray();
        $movie = $this->Movie->find()->where(['user_id' => $id])->toArray();
        $this->set('books', $books);
        $this->set('sermon', $sermon);
        $this->set('music', $music);
        $this->set('movie', $movie);
    }

    /**
     * @param $id
     *
     * edit book
     */
    public function editBook($id)
    {
        $bookData = $this->Book->find()->where(['id' => $id])->first();

        $verseID = HttpController::getLastHttpValueExplode('-');
        $bookTags = $this->BookTags->find()->where(['book_id' => $id, 'verse_id IN'=> ['0', $verseID]])->toArray();

        $attachFile = $this->VerseMediaBook->find()->where(['book_id' => $id, 'id_of_verse'=> $verseID])->toArray();


        $this->set('book', $bookData);
        $this->set('bookTags', $bookTags);
        $this->set('attachFile', $attachFile);
        $this->set('verseID', $verseID);
    }

    /**
     * @param $id
     *
     * update book
     */
    public function updateBook($id)
    {
        if($this->request->is('post')){
            $data = $this->request->data();
            $book = $this->Book->get($id, [
                'contain' => []
            ]);
            $book = $this->Book->patchEntity($book, $data);

            if(!empty($data['tags']) && $data['tagsId']) {
                $tagsValue = $data['tags'];
                $tagsId = $data['tagsId'];
                for ($i = 0; $i < count($tagsId); $i++) {
                    $tag = $this->BookTags->get($tagsId[$i]);
                    $tag->tag_name = $tagsValue[$i];
                    $this->BookTags->save($tag);
                }
            }

            if(!empty($data['newTags'])){
                $newTags = array_diff($data['newTags'], array(''));
                foreach ($newTags as $newTag) {
                    $bookTags = $this->BookTags->newEntity();
                    $bookTags->book_id = $id;
                    $bookTags->tag_name = $newTag;
                    $tag->verse_id = HttpController::getLastHttpValueExplode('-');
                    $this->BookTags->save($bookTags);
                }
            }

            if(!empty($data['newFile']) && !empty($data['newFile']['name'])){

                $newFile = $data['newFile'];
                $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $actual_linkByElement = explode('-',$actual_link);
                $reversedActual_link = array_reverse($actual_linkByElement);
                $verseID = $reversedActual_link[0];



                $fileName = $data['newFile']['name'];
                $mediaId = $this->VerseMediaBook->find()->select(['id'])->order(['id' => 'DESC'])->toArray();
                $mediaIdLast = $mediaId[0]->id;
                $newFileName = $mediaIdLast + 1;
                $fileNameArray = explode(".", $fileName);
                $fileNameArray[0] = $newFileName;
                $data['newFile']['name'] = implode(".", $fileNameArray);
                $fileName = $data['newFile']['name'];


                $uploadPath = 'uploads/files/book/';
                $uploadFile = $uploadPath.$fileName;
                $moveFile = move_uploaded_file($data['newFile']['tmp_name'],$uploadFile);

                if($moveFile){

                    $file = $this->VerseMediaBook->newEntity();
                    $file->name = $fileName;
                    $file->path = $uploadPath;
                    $file->file_extention = $data['newFile']['type'];
                    $file->id_of_verse = $verseID;
                    $file->book_id = $id;
                    $this->VerseMediaBook->save($file);

                }
            }

            if ($this->Book->save($book)) {
                $verseID = HttpController::getLastHttpValueExplode('-');
                if( $verseID === 'user') $this->redirect('/admin/edit-book/'.$id);
                $this->redirect('/admin/see-versus-content/'.$verseID);
            }
        }
    }



    /**
     * @param $id
     *
     * edit sermon
     */
    public function editSermon($id)
    {
        $sermonData = $this->Sermon->find()->where(['id' => $id])->first();

        $verseID = HttpController::getLastHttpValueExplode('-');
        $sermonTags = $this->Tags->find()->where(['sermon_id' => $id, 'verse_id IN'=> ['0', $verseID]])->toArray();
        $attachFile = $this->VerseMediaSermon->find()->where(['sermon_id' => $id, 'id_of_verse'=> $verseID])->toArray();

        $this->set('sermon', $sermonData);
        $this->set('sermonTags', $sermonTags);
        $this->set('attachFile', $attachFile);
        $this->set('verseID', $verseID);
    }

    /**
     * @param $id
     *
     * update sermon
     */
    public function updateSermon($id)
    {
        if($this->request->is('post')){
            $data = $this->request->data();
            $sermon = $this->Sermon->get($id, [
                'contain' => []
            ]);
            $sermon = $this->Sermon->patchEntity($sermon, $data);

            if(!empty($data['tags']) && $data['tagsId']) {
                $tagsValue = $data['tags'];
                $tagsId = $data['tagsId'];
                for ($i = 0; $i < count($tagsId); $i++) {
                    $tag = $this->Tags->get($tagsId[$i]);
                    $tag->tag_name = $tagsValue[$i];
                    $this->Tags->save($tag);
                }
            }

            if(!empty($data['newTags'])){
                $newTags = array_diff($data['newTags'], array(''));
                foreach ($newTags as $newTag) {
                    $bookTags = $this->Tags->newEntity();
                    $bookTags->sermon_id = $id;
                    $bookTags->tag_name = $newTag;
                    $tag->verse_id = HttpController::getLastHttpValueExplode('-');
                    $this->Tags->save($bookTags);
                }
            }

            if(!empty($data['newFile']) && !empty($data['newFile']['name'])){

                $newFile = $data['newFile'];
                $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $actual_linkByElement = explode('-',$actual_link);
                $reversedActual_link = array_reverse($actual_linkByElement);
                $verseID = $reversedActual_link[0];



                $fileName = $data['newFile']['name'];
                $mediaId = $this->VerseMediaSermon->find()->select(['id'])->order(['id' => 'DESC'])->toArray();
                $mediaIdLast = $mediaId[0]->id;
                $newFileName = $mediaIdLast + 1;
                $fileNameArray = explode(".", $fileName);
                $fileNameArray[0] = $newFileName;
                $data['newFile']['name'] = implode(".", $fileNameArray);
                $fileName = $data['newFile']['name'];


                $uploadPath = 'uploads/files/sermon/';
                $uploadFile = $uploadPath.$fileName;
                $moveFile = move_uploaded_file($data['newFile']['tmp_name'],$uploadFile);

                if($moveFile){
                    $file = $this->VerseMediaSermon->newEntity();
                    $file->name = $fileName;
                    $file->path = $uploadPath;
                    $file->file_extention = $data['newFile']['type'];
                    $file->id_of_verse = $verseID;
                    $file->sermon_id = $id;
                    $this->VerseMediaSermon->save($file);

                }
            }

            /*var_dump($newTags);die;*/

            if ($this->Sermon->save($sermon)) {
                $verseID = HttpController::getLastHttpValueExplode('-');
                if( $verseID === 'user') $this->redirect('/admin/edit-sermon/'.$id);
                $this->redirect('/admin/see-versus-content/'.$verseID);
            }
        }
    }

    /**
     * @param $id
     *
     * edit music
     */
    public function editMusic($id)
    {
        $musicData = $this->Music->find()->where(['id' => $id])->first();

        $verseID = HttpController::getLastHttpValueExplode('-');
        $musicTags = $this->MusicTags->find()->where(['music_id' => $id, 'verse_id IN'=> ['0', $verseID]])->toArray();
        $attachFile = $this->VerseMediaMusic->find()->where(['music_id' => $id, 'id_of_verse'=> $verseID])->toArray();

        $this->set('music', $musicData);
        $this->set('musicTags', $musicTags);
        $this->set('attachFile', $attachFile);
        $this->set('verseID', $verseID);
    }

    /**
     * @param $id
     *
     * update music
     */
    public function updateMusic($id)
    {
        if($this->request->is('post')){
            $data = $this->request->data();
            $music = $this->Music->get($id, [
                'contain' => []
            ]);

            $music = $this->Music->patchEntity($music, $data);

            if(!empty($data['tags']) && $data['tagsId']) {
                $tagsValue = $data['tags'];
                $tagsId = $data['tagsId'];
                for ($i = 0; $i < count($tagsId); $i++) {
                    $tag = $this->MusicTags->get($tagsId[$i]);
                    $tag->tag_name = $tagsValue[$i];
                    $this->MusicTags->save($tag);
                }
            }

            if(!empty($data['newTags'])){
                $newTags = array_diff($data['newTags'], array(''));
                foreach ($newTags as $newTag) {
                    $tag = $this->MusicTags->newEntity();
                    $tag->music_id = $id;
                    $tag->tag_name = $newTag;
                    $tag->verse_id = HttpController::getLastHttpValueExplode('-');
                    $this->MusicTags->save($tag);
                }
            }

            if(!empty($data['newFile']) && !empty($data['newFile']['name'])){

                $newFile = $data['newFile'];
                $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $actual_linkByElement = explode('-',$actual_link);
                $reversedActual_link = array_reverse($actual_linkByElement);
                $verseID = $reversedActual_link[0];



                $fileName = $data['newFile']['name'];
                $mediaId = $this->VerseMediaMusic->find()->select(['id'])->order(['id' => 'DESC'])->toArray();
                $mediaIdLast = $mediaId[0]->id;
                $newFileName = $mediaIdLast + 1;
                $fileNameArray = explode(".", $fileName);
                $fileNameArray[0] = $newFileName;
                $data['newFile']['name'] = implode(".", $fileNameArray);
                $fileName = $data['newFile']['name'];


                $uploadPath = 'uploads/files/music/';
                $uploadFile = $uploadPath.$fileName;
                $moveFile = move_uploaded_file($data['newFile']['tmp_name'],$uploadFile);

                if($moveFile){
                    $file = $this->VerseMediaMusic->newEntity();
                    $file->name = $fileName;
                    $file->path = $uploadPath;
                    $file->file_extention = $data['newFile']['type'];
                    $file->id_of_verse = $verseID;
                    $file->music_id = $id;
                    $this->VerseMediaMusic->save($file);

                }
            }

            if ($this->Music->save($music)) {
                $verseID = HttpController::getLastHttpValueExplode('-');
                if( $verseID === 'user') $this->redirect('/admin/edit-music/'.$id);
                $this->redirect('/admin/see-versus-content/'.$verseID);
            }
        }
    }

    /**
     * @param $id
     *
     * edit movie
     */
    public function editMovie($id)
    {
        $movieData = $this->Movie->find()->where(['id' => $id])->first();

        $verseID = HttpController::getLastHttpValueExplode('-');
        $movieTags = $this->MovieTags->find()->where(['movie_id' => $id, 'verse_id IN'=> ['0', $verseID]])->toArray();

        $movieFile = $this->VerseMedia->find()->where(['movie_id' => $id, 'id_of_verse'=> $verseID])->toArray();

        $this->set('movie', $movieData);
        $this->set('movieTags', $movieTags);
        $this->set('movieFile', $movieFile);
        $this->set('verseID', $verseID);
    }

    /**
     * @param $id
     *
     * update movie
     */
    public function updateMovie($id)
    {
        if($this->request->is('post')){
            $data = $this->request->data();
            $movie = $this->Movie->get($id, [
                'contain' => []
            ]);

            $movie = $this->Movie->patchEntity($movie, $data);

            if(!empty($data['tags']) && $data['tagsId']) {
                $tagsValue = $data['tags'];
                $tagsId = $data['tagsId'];
                for ($i = 0; $i < count($tagsId); $i++) {
                    $tag = $this->MovieTags->get($tagsId[$i]);
                    $tag->tag_name = $tagsValue[$i];
                    $this->MovieTags->save($tag);
                }
            }

            if(!empty($data['newTags'])){
                $newTags = array_diff($data['newTags'], array(''));
                foreach ($newTags as $newTag) {
                    $tag = $this->MovieTags->newEntity();
                    $tag->movie_id = $id;
                    $tag->tag_name = $newTag;
                    $tag->verse_id = HttpController::getLastHttpValueExplode('-');
                    $this->MovieTags->save($tag);
                }
            }

            if(!empty($data['newFile']) && !empty($data['newFile']['name'])){

                $newFile = $data['newFile'];
                $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $actual_linkByElement = explode('-',$actual_link);
                $reversedActual_link = array_reverse($actual_linkByElement);
                $verseID = $reversedActual_link[0];

                $fileName = $data['newFile']['name'];
                $mediaId = $this->VerseMedia->find()->select(['id'])->order(['id' => 'DESC'])->toArray();
                $mediaIdLast = $mediaId[0]->id;
                $newFileName = $mediaIdLast + 1;
                $fileNameArray = explode(".", $fileName);
                $fileNameArray[0] = $newFileName;
                $data['newFile']['name'] = implode(".", $fileNameArray);
                $fileName = $data['newFile']['name'];


                $uploadPath = 'uploads/files/';
                $uploadFile = $uploadPath.$fileName;
                $moveFile = move_uploaded_file($data['newFile']['tmp_name'],$uploadFile);

                if($moveFile){

                        $file = $this->VerseMedia->newEntity();
                        $file->name = $fileName;
                        $file->path = $uploadPath;
                        $file->file_extention = $data['newFile']['type'];
                        $file->id_of_verse = $verseID;
                        $file->movie_id = $id;
                        $this->VerseMedia->save($file);

                }
            }

            if ($this->Movie->save($movie)) {
                $verseID = HttpController::getLastHttpValueExplode('-');
                if($verseID === 'user') $this->redirect('/admin/edit-movie/'.$id);
                $this->redirect('/admin/see-versus-content/'.$verseID);
            }
        }
    }

    /**
     * @param $id
     *
     * delete book
     */
    public function deleteBook($id)
    {
        $session = $this->request->session();
        $userId = $session->read('UserDataEdit.user_id');
        $adm = $this->Book->get($id);
        if($this->Book->delete($adm)){
            $this->redirect('/admin/edit/'.$userId);
        }
    }

    /**
     * @param $id
     *
     * delete sermon
     */
    public function deleteSermon($id)
    {
        $session = $this->request->session();
        $userId = $session->read('UserDataEdit.user_id');
        $adm = $this->Sermon->get($id);
        if($this->Sermon->delete($adm)){
            $this->redirect('/admin/edit/'.$userId);
        }
    }

    /**
     * @param $id
     *
     * delete music
     */
    public function deleteMusic($id)
    {
        $session = $this->request->session();
        $userId = $session->read('UserDataEdit.user_id');
        $adm = $this->Music->get($id);
        if($this->Music->delete($adm)){
            $this->redirect('/admin/edit/'.$userId);
        }
    }

    /**
     * @param $id
     *
     * delete movie
     */
    public function deleteMovie($id)
    {
        $session = $this->request->session();
        $userId = $session->read('UserDataEdit.user_id');
        $adm = $this->Movie->get($id);
        if($this->Movie->delete($adm)){
            $this->redirect('/admin/edit/'.$userId);
        }
    }
}
