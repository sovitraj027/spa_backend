<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    use ImageTrait;
    //
    public function index()
    {
        $reviews = Review::get();

        return view('backend.review.review-list', compact('reviews'));
    }

    public function create()
    {

        return view('backend.review.create-review');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',

        ]);
        $path =  $this->imageUpload($request->image, 'reviews');
        $review = Review::create([
            'image' => $path
        ]);
        if ($review) {
            showMessage('success', 'Successfully Created!!');
        }

        return redirect()->route('admin.homepage.reviews.index');
    }

    public function edit($id)
    {
        $review = Review::find($id);

        return view('backend.review.create-review', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        if ($review->image && $request->file('image')) {

            deleteImage($review->image);

            $path = $this->imageUpload($request->image, 'reviews');
        }
        $update = $review->update([

            'image' => $path ?? $review->image
        ]);
        if ($update) {
            showMessage('success', 'updated');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $review = Review::find($id);

        deleteImage($review->image);

        $delete = $review->delete();
        if ($delete) {
            showMessage('success', 'deleted');
        }
        return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $review = Review::find($request->review_id);
        $review->status = $request->status;
        $review->save();

        return response()->json([
            'success' => true,
            'message' => 'Status Changed Successfully.'
        ]);
    }
}
