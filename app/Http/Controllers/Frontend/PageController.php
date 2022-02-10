<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class PageController extends Controller
{
    // constructor
    public function __construct()
    {
        $this->with = ['generic:id,display_name', 'brand:id,display_name', 'productCategory:id,display_name', 'dosageForm:id,display_name'];
        $this->paginate = config('paginate.size');
    }

    // render home page
    public function home()
    {
        $products = Product::with($this->with)->whereIn('id', [170, 191, 177, 224, 190, 212, 7, 69])
                            ->orderBy('display_name', 'asc')->paginate($this->paginate);

        return Inertia::render('Frontend/Home', [
            'products' => $products
        ]);
    }

    // render product index page
    public function productIndex(Request $request)
    {
        $type = $request->input('type', null);
        $search = $request->input('search', null);

        $products = [];
        $subtitle = null;

        $products = Product::with($this->with);

        if ($type === 'human') {
            $subtitle = 'Human Health';
            $products = $products->whereIn('product_category_id', [1, 3]);
        }
        if ($type === 'vat') {
            $subtitle = 'Animal Health';
            $products = $products->where('product_category_id', 2);
        }

        if($search) {
            $products = $products->where('display_name', 'like', "$search%");
        }

        $products = $products->orderBy('display_name', 'asc')
                            ->paginate($this->paginate);

        return Inertia::render('Frontend/Product/Index', [
            'products' => $products,
            'subtitle' => $subtitle
        ]);
    }

    // render product single page
    public function productSingle($name)
    {
        $product = Product::with($this->with)->where('name', $name)->first();

        return Inertia::render('Frontend/Product/Single', [
            'product' => $product
        ]);
    }

    // render news index page
    public function newsIndex()
    {
        return Inertia::render('Frontend/News/Index');
    }

    // render news single page
    public function newsSingle($slug)
    {
        return Inertia::render('Frontend/News/Single');
    }

    // render about page
    public function about()
    {
        return Inertia::render('Frontend/About/About');
    }

    // render contact page
    public function contact()
    {
        return Inertia::render('Frontend/About/Contact');
    }

    // render mission vission page
    public function missionVision()
    {
        return Inertia::render('Frontend/About/Mission');
    }

    // render history page
    public function history()
    {
        return Inertia::render('Frontend/About/History');
    }

    // render message from md page
    public function messageFromMD()
    {
        return Inertia::render('Frontend/About/MessageFromMD');
    }
}
