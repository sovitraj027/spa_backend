<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Category;
use App\Trait\ImageTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory

{
    use ImageTrait;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $blog = Blog::where('type','blog')->first();
        $image = 'blog/'.Str::random(10).time().'.jpg';
        $path = Storage::copy('public/'.$blog->image, 'public/'.$image);
      
        // $path = $this->imageUpload($image,'blog');
        return [
            //
            'category_id'=> rand(1,2),
            'title_1'=>$this->faker->sentence(4),
            'description'=>$this->faker->paragraph(),
            'author'=>'admin',
            'image'=>$image,
            'type'=>'blog'
        ];
    }
}
