<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Models\Seller;

class SellerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @param Seller $seller
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Seller $seller)
    {
        $categories = $seller->products()
            ->whereHas('category')
            ->with('category')
            ->get()
            ->pluck('category')
            ->collapse()
            ->unique('id')
            ->values();

        return $this->showAll($categories);
    }
}
