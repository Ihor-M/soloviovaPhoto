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

    /**
     * @return $albumsInCategory, $titlePhotos
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function photos()
    {
        $category = 'wedding';

        return view('pages.' . $category, compact('category'));
    }
    
    public function blog()
    {
        return view('pages.blog');
    }
    
    public function info()
    {
        return view('pages.info');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAlbum($id)
    {
        $album = $this->albumRepository->album($id);

        return view('pages.album', compact('album'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('pages.contact');
    }
}
