<?php

namespace App\Http\Controllers\V1;

use App\Repositories\CategoriesRepository;
use App\Repositories\PhotosRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;

    /**
     * @var PhotosRepository
     */
    private $photosRepository;

    /**
     * CategoriesController constructor.
     * @param CategoriesRepository $categoriesRepository
     * @param PhotosRepository $photosRepository
     */
    public function __construct(CategoriesRepository $categoriesRepository, PhotosRepository $photosRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->photosRepository = $photosRepository;
    }

    /**
     * @param $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($category)
    {
        // select photos from specific category
        $photosInCategory = $this->photosRepository->categoryPhotos($category);
        // select specific category with its albums
        $categoryWithAlbums = $this->categoriesRepository->categoryAlbums($category);
        // create array of album title photos
        $titlePhotos = [];
        foreach ($categoryWithAlbums as $albums)
        {
            $albumsInCategory = $albums->albums;
            // get album id
            foreach ($albumsInCategory as $album)
            {
                array_push($titlePhotos, $this->photosRepository->firstPhoto($album->id));
            }
        }

        return view('pages.' . $category, compact('albumsInCategory', 'category', 'photosInCategory', 'titlePhotos'));
    }
}
