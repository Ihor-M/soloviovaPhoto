<?php

namespace App\Http\Controllers\V1;

use App\Repositories\CategoriesRepository;
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
     * CategoriesController constructor.
     * @param CategoriesRepository $categoriesRepository
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

}
