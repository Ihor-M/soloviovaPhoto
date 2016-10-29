<?php

namespace App\Repositories;


use App\Entities\Category;

class CategoriesRepository extends AbstractRepository
{
    /**
     * @return mixed
     */
    protected function model()
    {
        return Category::class;
    }

    /**
     * @return mixed
     */
    public function albums()
    {
        return $this->model->with('albums', 'albums.photos')->get();
    }
}