<?php

namespace App\Http\Controllers\V1;

use App\Repositories\AlbumRepository;
use App\Repositories\PhotosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CreateAlbumController extends Controller
{
    /**
     * @var AlbumRepository
     */
    private $albumRepo;

    /**
     * @var PhotosRepository
     */
    private $photosRepo;

    /**
     * CreateAlbumController constructor.
     * @param AlbumRepository $albumRepo
     * @param PhotosRepository $photosRepo
     */
    public function __construct(AlbumRepository $albumRepo, PhotosRepository $photosRepo)
    {
        $this->albumRepo = $albumRepo;
        $this->photosRepo = $photosRepo;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateAlbumForm()
    {
        $albums = $this->albumRepo->getAll();
        return view('pages.createAlbum', compact('albums'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAlbum(Request $request)
    {
        $this->validate($request, [
            'albumName' => 'required|max:100',
            'shotDate' => 'required|date',
            'category' => 'required|integer'
        ]);

        $newAlbum = $this->albumRepo->create([
            'name' => $request->albumName,
            'shot_date' => $request->shotDate,
            'category_id' => $request->category
        ]);
        $newAlbum->save();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUploadForm($id)
    {
        $album = $this->albumRepo->getById($id);
        $photoInAlbum = $this->photosRepo->showPhotos($id);
        return view('pages.uploadForm', compact('album', 'photoInAlbum'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePhotos(Request $request)
    {
//       $album = $this->albumRepo->getById($request->albumId);
        if($request->hasFile('newPhotos'))
        {
//            dd($request);
            $photo = $request->file('newPhotos');
            $fileName = str_random(20) . '.' . $photo->getClientOriginalExtension();
            $filePath = public_path('images/albums/' . $fileName);
            Image::make($photo)->fit(450, 300)->save($filePath);

            $newPhoto = $this->photosRepo->create([
                'photo_path' => $filePath,
                'photo_name' => $fileName,
                'album_id' => $request->albumId
            ]);
            $newPhoto->save();
        }
//        $photoInAlbum = $this->photosRepo->showPhotos($request->albumId);

        return redirect()->back();
    }

    public function showAlbum($id)
    {

    }

    public function allAlbums()
    {

    }

    public function categoryAlbum($catId)
    {

    }
}
