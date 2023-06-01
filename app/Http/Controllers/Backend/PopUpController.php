<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PopUp;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PopUpController extends Controller
{
    use ImageTrait;
    //
    public function index()
    {
        $popups = PopUp::get();

        return view('backend.homepage.popup.popup-list', compact('popups'));
    }

    public function create()
    {

        return view('backend.homepage.popup.create-popup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required'
        ]);
        $path =  $this->imageUpload($request->image, 'popups');
        $popup = PopUp::create([
            'title' => $request->title,
            'image' => $path
        ]);
        if ($popup) {
            showMessage('success', 'Successfully Created!!');
        }

        return redirect()->route('admin.homepage.popups.index');
    }

    public function edit($id)
    {
        $popup = PopUp::find($id);

        return view('backend.homepage.popup.create-popup', compact('popup'));
    }

    public function update(Request $request, $id)
    {
        $popup = PopUp::find($id);
        if ($popup->image && $request->file('image')) {

            deleteImage($popup->image);

            $path = $this->imageUpload($request->image, 'popups');
        }
        $update = $popup->update([
            'title' => $request->title,

            'image' => $path ?? $popup->image
        ]);
        if ($update) {
            showMessage('success', 'updated');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $popup = PopUp::find($id);
        deleteImage($popup->image);
        $delete = $popup->delete();
        if ($delete) {
            showMessage('success', 'deleted');
        }
        return redirect()->back();
    }
    public function changeStatus(Request $request)
    {
        $popup = PopUp::find($request->popup_id);
        $popup->status = $request->status;
        $popup->save();

        return response()->json([
            'message' => 'Status Changed Successfully.'
        ]);
    }
}
