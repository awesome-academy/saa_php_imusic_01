<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RateRequest;
use App\Repositories\RateRepository;
use Illuminate\Http\Request;

class RateController extends Controller
{
    protected $rateRepo;
    public function __construct(RateRepository $rateRepo)
    {
        $this->rateRepo = $rateRepo;
    }

    public function create(RateRequest $request)
    {
        $result = $this->rateRepo->store($request);
        if(isset($result)){
            return response()->json([
                'success' => false,
                'message' => trans('add_rate_fail'),
                'data' => ''
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => trans('add_rate_fail'),
            'data' => ''
        ]);
    }
}
