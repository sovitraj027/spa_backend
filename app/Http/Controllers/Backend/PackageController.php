<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageBooking;
use App\Models\PackageCategory;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PackageController extends Controller
{
    //
    use ImageTrait;

    public function index()
    {
        $packages = Package::with('category')->get();
        return view('backend.package.list', compact('packages'));
    }

    public function edit($id)
    {
        $categories = PackageCategory::all();
        $package = Package::find($id);
        return view('backend.package.create', compact('categories', 'package'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'package_category_id' => 'required'
        ], [
            'package_category_id.required' => 'package category required'
        ]);
        $categories = PackageCategory::all();
        $package = Package::where('id', $id)->update($request->except(['_method', '_token']));
        showMessage('success', 'updated');
        return redirect()->back();
    }
    public function create()
    {
        $categories = PackageCategory::all();
        return view('backend.package.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'package_category_id' => 'required'
        ], [
            'package_category_id.required' => 'package category required'
        ]);

        $package = Package::create($request->all());
        if ($package) {
            showMessage('success');
        }

        return redirect()->back();
    }


    public function delete($id)
    {
        $package = Package::destroy($id);

        showMessage('success', 'deleted');

        return redirect()->back();
    }

    public function storeCategory(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);
        if ($request->file('image')) {
            $path = $this->imageUpload($request->image, 'package');
        }

        $package_category = PackageCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path ?? null
        ]);
        showMessage('success');
        return redirect()->back();
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

        ]);
        $package_category = PackageCategory::findOrFail($id);
        if ($request->file('image')) {
            deleteImage($package_category->image);
            $path = $this->imageUpload($request->image, 'package');
        }
        $package_category =  $package_category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path ?? $package_category->image
        ]);
        showMessage('success', 'updated');
        return redirect()->back();
    }

    public function deleteCategory($id)
    {
        $package_category = PackageCategory::findOrFail($id);
        if ($package_category->image) {
            deleteImage($package_category->image);
        }

        $package_category->delete();
        showMessage('success', 'deleted');
        return redirect()->back();
    }

    public function bookingList()
    {
        return view('backend.packagebooking.booking-list', [
            'bookings' => PackageBooking::latest()->get()
        ]);
    }
}
