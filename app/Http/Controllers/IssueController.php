<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueRequest;
use App\Models\Issue;
use App\Models\Status;
use App\Services\IssueService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class IssueController extends Controller
{
    private const PENDING_STATUS = 1;

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('issues.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $issue = new Issue();
        return view('issues.create', compact('issue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IssueService $service
     * @param IssueRequest $request
     * @return RedirectResponse
     */
    public function store(IssueService $service, IssueRequest $request): RedirectResponse
    {
        $created = $service->store(array_merge(
            $request->validated(),
            [
                'user_id' => Auth::user()->id,
                'status_id' => self::PENDING_STATUS,
            ])
        );

        if ($created) {
            Session::flash('success', 'Issue successfully added!');
        } else {
            Session::flash('error', 'There was a problem creating the issue!');
        }

        return redirect()->route('issues.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Issue $issue
     * @return View|RedirectResponse
     */
    public function edit(Issue $issue): View|RedirectResponse
    {
        if (! Gate::allows('update-delete-issue', $issue)) {
            return back()->withErrors('You are not authorized to perform this action.');
        }

        $statuses = Status::all();
        return view('issues.edit', compact('issue', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IssueRequest $request
     * @param Issue $issue
     * @return RedirectResponse
     */
    public function update(IssueService $service, IssueRequest $request, Issue $issue): RedirectResponse
    {
        if (! Gate::allows('update-delete-issue', $issue)) {
            return back()->withErrors('You are not authorized to perform this action.');
        }

        if ($service->update($issue, $request->validated())) {
            Session::flash('success', 'Issue successfully updated!');
        } else {
            Session::flash('error', 'There was a problem updating the issue!');
        }

        return redirect()->route('issues.index');
    }
}
