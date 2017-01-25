<?php

namespace App\Http\Controllers\V1;

use App\Repositories\CreateFeedbackRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreateFeedbackController extends Controller
{
    /**
     * @var CreateFeedbackRepository
     */
    private $feedbackRepository;

    /**
     * CreateFeedbackController constructor.
     * @param CreateFeedbackRepository $feedbackRepository
     */
    public function __construct(CreateFeedbackRepository $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $feedbacks = $this->feedbackRepository->allFeedbackWithAlbum();

        return view('pages.createFeedback', compact('feedbacks'));
    }
}
