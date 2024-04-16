<?php

namespace App\Http\Controllers;

use App\Imports\RedirectLinksImport;
use Illuminate\Http\Request;
use App\Repositories\RedirectLinkRepository;
use Maatwebsite\Excel\Facades\Excel;


class RedirectLinkController extends Controller
{
    private $redirectLinkRepository;

    public function __construct()
    {
        $this->redirectLinkRepository = new RedirectLinkRepository;
    }

    public function index(Request $request)
    {
        return view('cms.redirect_links.index', [
            'data'    => $this->redirectLinkRepository->filter($request),
        ]);
    }

    public function store(Request $request)
    {
        $request['issue_link'] = cleanDomainRedirect($request->issue_link);
        $request['fix_link'] = cleanDomainRedirect($request->fix_link);

        $this->validate(
            $request,
            [
                'issue_link' => 'bail|required|unique:redirect_links,issue_link,',
                'fix_link'   => 'bail|required',
            ],
            [
                'required' => ' The :attribute field is required.',
                'unique'   => ' The :attribute field must be unique. Please choose another :attribute !',
            ]
        );

        $data = $this->redirectLinkRepository->create($request->all());

        return redirect()->route('rcms.redirect-links.index', $data->id)->with(['success' => 'Create Redirect Links Success']);
    }

    public function update(Request $request, $id)
    {
		$request['issue_link'] = cleanDomainRedirect($request->issue_link);
        $request['fix_link'] = cleanDomainRedirect($request->fix_link);
        $this->validate(
            $request,
            [
                'issue_link' => 'bail|required|unique:redirect_links,issue_link,' . $id,
                'fix_link'   => 'bail|required',
            ],
            [
                'required' => ' The :attribute field is required.',
                'unique'   => ' The :attribute field must be unique. Please choose another :attribute !',
            ]
        );

        $result = $this->redirectLinkRepository->update($id, $request->all());

        return $result ? back()->with(['success' => 'Update success']) : back()->with(['error' => 'Update fail']);
    }

    public function destroy($id)
    {
        $result = $this->redirectLinkRepository->delete($id);

        return $result ? back()->with(['success' => 'Delete success']) : back()->with(['error' => 'Delete fail']);
    }

    public function storeImport(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new RedirectLinksImport, $file);

        return redirect()->route('rcms.redirect-links.index')->with(['success' => 'Import finished']);
    }
}