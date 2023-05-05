<?php

namespace App\Http\Controllers\V1\Analytics;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;

class ProductController extends Controller
{

    public function __construct(protected AnalyticsService $analyticsService){}

    public function mostSold(){
        return $this->analyticsService->mostSold();
    }

    public function higherStock(){
        return $this->analyticsService->higherStock();
    }
}
