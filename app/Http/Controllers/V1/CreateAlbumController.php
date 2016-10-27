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
        $albums = $this->albumRepo->allAlbums();
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
    public function editAlbum($id)
    {
        $album = $this->albumRepo->getById($id);
        return view('pages.editAlbum', compact('album'));
    }

    public function updateAlbum(Request $request, $id)
    {
        $this->validate($request, [
            'albumName' => 'required|max:100',
            'shotDate' => 'required|date',
            'category' => 'required|integer'
        ]);

        $this->albumRepo->update($id, [
            'name' => $request->albumName,
            'shot_date' => $request->shotDate,
            'category_id' => $request->category
        ]);

        return redirect()->route('CreateAlbum');
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
        $files = $request->file('newPhotos');
        $amount = count($files);
        $requestSize = 0;
        // counting request size
        for ($i = 0; $i <= $amount - 1; $i++)
        {
            $requestSize = filesize($files[$i]) + $requestSize;
        }
        // validate request size
        $alert = null;
        if ($requestSize > 20000000)
        {
            $alert = "Please choose files less than 20Mb in total.";
        }
        // save photos
        try {
            if($request->hasFile('newPhotos'))
            {
                $album = $this->albumRepo->getById($request->get('albumId'));
                $photos = $request->file('newPhotos');
                foreach ($photos as $photo)
                {
                    $fileName = preg_replace('/\s+/', '', $album->name)
                                . str_random(5)
                                . '.'
                                . $photo->getClientOriginalExtension();
                    $filePath = public_path('images/albums/' . $fileName);
                    // check image orientation and resize it
                    $exifData = Image::make($photo)->exif();
                    $dimensions = $exifData['COMPUTED'];
                    if ($dimensions['Width'] > $dimensions['Height'])
                    {
                        Image::make($photo)->fit(780, 520)->save($filePath);
                    } else {
                        Image::make($photo)->fit(520, 780)->save($filePath);
                    }
                    // save to data base
                    $newPhoto = $this->photosRepo->create([
                        'photo_path' => $filePath,
                        'photo_name' => $fileName,
                        'album_id' => $request->get('albumId')
                    ]);
                    $newPhoto->save();
                }
            }
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect(url('admin-upload-photos/' . $request->get('albumId')))->with(['alert' => $alert]);
    }

    public function showAlbum($id)
    {
        $album = $this->albumRepo->album($id);

        return ;
    }

    public function allAlbums()
    {

    }

    public function categoryAlbum($catId)
    {

    }

    /**
     *
     * Delete album with his photos
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $photosInAlbum = $this->photosRepo->showPhotos($id);
        foreach ($photosInAlbum as $photo)
        {
            unlink(public_path('images/albums/' . $photo->photo_name));
            $this->photosRepo->delete($photo->id);
        }

        $this->albumRepo->delete($id);

        return redirect()->route('showCreateAlbumForm');
    }

    /**
     *
     * Delete single photo
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePhoto($id)
    {
        $photo = $this->photosRepo->getById($id);
        unlink(public_path('images/albums/' . $photo->photo_name));
        $this->photosRepo->delete($id);

        return redirect()->back();
    }
}
