<?php

namespace App\Http\Controllers\V1;

use App\Repositories\AlbumRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\PhotosRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

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

    /**
     * @return $albumsInCategory, $albums, $titlePhotos
     */
    public function blog()
    {
        $albumsInCategory = $this->categoriesRepository->albums();
        $albums = $this->albumRepository->allAlbums();
        $titlePhotos = [];
        foreach ($albums as $album)
        {
            $albumId = $album->id;
            array_push($titlePhotos, $this->photosRepository->firstPhoto($albumId));
        }

        return view('pages.blog')->with([
            'albumsInCategory' => $albumsInCategory,
            'albums' => $albums,
            'titlePhotos' => $titlePhotos
        ]);

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
        $photoDimensions = [];
        foreach ($album->photos as $photo) {
            $exifData = Image::make($photo->photo_path)->exif();
            $dimensions = $exifData['COMPUTED'];
            array_push($photoDimensions, $dimensions);
        }

        return view('pages.album', compact('album', 'photoDimensions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('pages.contact');
    }
}
