<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\IssueService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IssueService $service
     * @return LengthAwarePaginator
     */
    public function index(IssueService $service): LengthAwarePaginator
    {
        return $service->listAll();
    }
}
