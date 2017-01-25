<?php

namespace App\Repositories;


use App\Entities\Feedback;

class CreateFeedbackRepository extends AbstractRepository
{
    /**
     * @return mixed
     */
    protected function model()
    {
        return Feedback::class;
    }

    /**
     * @return mixed
     */
    public function allFeedbackWithAlbum()
    {
        return $this->model->with('album')->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function feedbackWithAlbum($id)
    {
        return $this->model->with('album')->where('album_id', $id)->get();
    }
}