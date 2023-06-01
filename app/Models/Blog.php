<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\UrlWindow;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title_1','title_2','short_description','description','image','author','category_id','type'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
    public static function render(LengthAwarePaginator $paginator, $onEachSide = 2)
    {
        $window = UrlWindow::make($paginator, $onEachSide);

        $elements = array_filter([
            $window['first'],
            is_array($window['slider']) ? '...' : null,
            $window['slider'],
            is_array($window['last']) ? '...' : null,
            $window['last'],
        ]);

        return LengthAwarePaginator::viewFactory()->make(LengthAwarePaginator::$defaultView, [
            'paginator' => $paginator,
            'elements' => $elements,
        ])->render();
    }
}
