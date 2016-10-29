<?php

namespace App\Http\Controllers\V1;

use App\Repositories\AlbumRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\PhotosRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    /**
     * @var AlbumRepository
     */
    private $albumRepository;

    /**
     * @var PhotosRepository
     */
    private $photosRepository;

    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;

    /**
     * MainController constructor.
     * @param AlbumRepository $albumRepository
     * @param PhotosRepository $photosRepository
     * @param CategoriesRepository $categoriesRepository
     */
    public function __construct(AlbumRepository $albumRepository,
                                   PhotosRepository $photosRepository,
                                   CategoriesRepository $categoriesRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->photosRepository = $photosRepository;
        $this->categoriesRepository = $categoriesRepository;
    }


    public function home()
    {
        $albumsInCategory = $this->categoriesRepository->albums();
        $titlePhotos = [];
        foreach ($albumsInCategory as $allAlbums)
        {
            $albums = $allAlbums->albums;
            foreach ($albums as $album)
            {
                $albumId = $album->id;
                array_push($titlePhotos, $this->photosRepository->firstPhoto($albumId));
            }
        }

        return view('pages.home')->with([
            'albumsInCategory' => $albumsInCategory,
            'titlePhotos' => $titlePhotos
        ]);
    }
    
    public function photos()
    {
        return view('pages.photos');
    }
    
    public function blog()
    {
        return view('pages.blog');
    }
    
    public function info()
    {
        return view('pages.info');
    }
}
