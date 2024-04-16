<?php

namespace App\Http\Controllers;

use App\Repositories\CaseStudyRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\TestimonialRepository;
use App\Repositories\WebinarRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RSolution\Academy\Models\Course;
use RSolution\Academy\Repositories\CourseRepository;


class HomeController extends Controller
{
	private $caseStudyRepository;
	private $webinarRepository;
	private $categoryRepository;

	public function __construct()
	{
		$this->caseStudyRepository = new CaseStudyRepository;
		$this->webinarRepository = new WebinarRepository;
		$this->categoryRepository = new CategoryRepository;

	}

	public function index()
	{
		return view('pages/home');
	}

	public function test()
	{
		$user = Auth::user();
		dd($user->toArray());
	}

	public function getCaseStudyPage(Request $request)
	{
		$specialCaseStudy = $this->caseStudyRepository->getCaseStudySpecial(3, [$this->caseStudyRepository::SPECIAL]);
		$data['case-study'] = $this->caseStudyRepository->getCaseStudyActive($request);
		$data['special'] = $specialCaseStudy->where('special', $this->caseStudyRepository::SPECIAL)->values();
		$data['categories'] = $this->categoryRepository->getByKey('type', $this->categoryRepository::TYPE_CASE_STUDY, 'id');

		return view('/pages/case_study/index', compact('data'));
	}

	public function getReviewPage(Request $request)
	{
		$data = $this->caseStudyRepository->getCaseStudyActive();
		return view('/pages/review', compact('data'));
	}

	public function getEnterprisePage(Request $request)
	{
		$courses =  (new CourseRepository)->getCoursesByStatus([Course::STATUS_ACTIVE, Course::STATUS_UPCOMING]);
		$data['courses'] = $courses;
		return view('/pages/landing_page/enterprise', compact('data'));
	}

	public function getWebinarPage(Request $request) {
		// $data['webinars'] = $this->webinarRepository->getWebinarActive($request);		
		// $data['top-picks'] = $this->webinarRepository->getWebinarSpecial($request);
		// $data['category'] = $this->categoryRepository->getByKey('type', $this->categoryRepository::TYPE_WEBINAR_SERIES);
        // return view('/pages/webinar', compact('data'));
		$data = (new WebinarRepository)->getWebinarActive($request);
        return view('/pages/webinar_old', compact('data'));
    }

	public function getTestimonialPage()
    {
        $data = (new TestimonialRepository)->getTestimonialActive();
		
        return view('/pages/testimonial', compact('data'));
    }
}
