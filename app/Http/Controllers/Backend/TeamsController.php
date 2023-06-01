<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamsController extends Controller
{
    //
    use ImageTrait;

    public function bannerCreate()
    {
        if(Team::where('type','banner')->exists())
        {
            $banner = Team::where('type','banner')->first();
            return view('backend.teams.banner.create',compact('banner'));
        }
        return view('backend.teams.banner.create'); 
    }

    public function store(Request $request)
    {
        
        if($request->file('image')){
            $path =  $this->imageUpload($request->image,'teams');

        }
      
        $teams = Team::create([
            'title'=>$request->title,
            'title_2'=>$request->title_2,
            'description'=>$request->description,
            'designation'=>$request->designation,
            'image'=>$path ?? null,
            'type'=>$request->type,
            ]);
       if($teams){
        showMessage('success','created');
       }
    
       return redirect()->back(); 
    }

    public function update(Request $request,$id)
    {
        $teams = Team::find($id);
        if($request->file('image')){
            if($teams->image && File::exists(raw_image_path($teams->image))){
                unlink(raw_image_path($teams->image));
            }
            $path = $this->imageUpload($request->image,'teams');
        }

        $update = $teams->update([
            'title'=>$request->title,
            'title_2'=>$request->title_2,
            'description'=>$request->description,
            'designation'=>$request->designation,
            'image'=>$path ?? $teams->image,
            'type'=>$request->type,
           ]);
        if($update){
            showMessage('success','updated');
        }
        return redirect()->back();

    }
    //section One
    public function teamList()
    {
        $data['teams'] = Team::where('type','team')->get();
        $data['teams_title'] = Team::where('type','teams_title')->first();
        return view('backend.teams.team-list',$data);
    }

    public function teamCreate()
    {
        return view('backend.teams.create-team');
    }

    public function teamEdit($id){
        $team = Team::findOrFail($id);
        return view('backend.teams.create-team',compact('team'));
    }

    public function delete($id)
    {
        $team = Team::find($id);
    
            if($team->image && File::exists(raw_image_path($team->image))){
                unlink(raw_image_path($team->image));
            }
        $delete = $team->delete();
        if($delete){
            showMessage('success','deleted');
        }
        return redirect()->back();
        
    }
}
