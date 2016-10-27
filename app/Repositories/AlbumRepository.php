<?php

namespace App\Repositories;


use App\Entities\Album;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AlbumRepository extends AbstractRepository
{
    /**
     * @return mixed
     */
    protected function model()
    {
        return Album::class;
    }

    /**
     * @return mixed
     */
    public function allAlbums()
    {
        return $this->model->with('photos', 'category')->orderBy('created_at', 'dsc')->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function album($id)
    {
        return $this->model->with('photos', 'category')->find($id);
    }
}
