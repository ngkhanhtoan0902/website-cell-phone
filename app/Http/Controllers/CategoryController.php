<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	private $categoryRepository;
    private $messageValidate = [
        'required' => ' The :attribute field is required.',
        'unique'   => ' The :attribute field must be unique. Please chose another :attribute !',
        'image'    => ' Invalid :attribute ',
        'max'      => ' The maximum of :attribute is :max',
        'alpha'    => "The :attribute field shouldn't contain special characters"
    ];

	public function __construct()
	{
		$this->categoryRepository = New CategoryRepository;
	}

	public function index(Request $request)
	{
		$data = $this->categoryRepository->filter($request);
		return view('/cms/categories/index',compact('data'));
	}

	public function store(Request $request)
	{
		$this->validate(
            $request,
            [
                'title'             => 'bail|required|max:255',
                'slug'              => 'bail|required|max:255',
            ],
            $this->messageValidate
        );

        $this->categoryRepository->create($request->all());
		return redirect()->back()->with(['success' => 'Success']);
	}

	public function update(Request $request, $id)
	{
		$this->validate(
            $request,
            [
                'title'             => 'bail|required|max:255',
                'slug'              => 'bail|required|max:255',
            ],
            $this->messageValidate
        );

		$this->categoryRepository->update($id, $request->all());
		return redirect()->back()->with(['success' => 'Success']);
	}

	public function destroy($id)
	{
		$data = $this->categoryRepository->find($id);

		if(!count($data->posts)){
			$data->delete();
			return redirect()->back()->with(['success' => 'Success']);
		}
		
		return redirect()->back()->with(['error' => "Can't delete when it has posts"]);
	}


}
