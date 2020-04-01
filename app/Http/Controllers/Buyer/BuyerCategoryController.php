<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\ApiController;
use App\Models\Buyer;


class BuyerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @param Buyer $buyer
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Buyer $buyer)
    {
        $categories = $buyer->transactions()
            ->with('product.category')
            ->get()
            ->pluck('product.category')
            ->collapse()
            ->unique('id')
            ->values();

        return $this->showAll($categories);
    }

}
