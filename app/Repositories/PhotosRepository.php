<?php

namespace App\Repositories;

use App\Entities\Photo;

class PhotosRepository extends AbstractRepository
{
    /**
     * @return mixed
     */
    protected function model()
    {
        return Photo::class;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showPhotos($id)
    {
        return $this->model->with('album')->where('album_id', '=', $id)->get();
    }

    /**
     *
     * Show first photo from album
     * @param $id
     * @return mixed
     */
    public function firstPhoto($id)
    {
        return $this->model->with('album', 'album.category')->where('album_id', '=', $id)->first();
    }
}
