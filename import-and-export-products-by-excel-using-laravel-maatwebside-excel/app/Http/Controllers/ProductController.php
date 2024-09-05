<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExprot;
class ProductController extends Controller
{
    //
    public function index()
    {
        // phpinfo();
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function importProducts(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Products imported successfully!');
    }

    public function exportProducts(Request $request)
    {

        return Excel::download(new ProductExprot, 'invoices.xlsx');
    }
}
