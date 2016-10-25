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
}
