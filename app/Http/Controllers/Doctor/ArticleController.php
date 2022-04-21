<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->where("doctor_id", Auth::guard("doctor")->user()->id)->get();
        return view("doctor.articles.index", compact("articles"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:255",
            "description" => "required",
            "image" => "nullable",
        ]);

        $img_path = null;
        if ($request->hasFile("image")) {
            $image_obj = $request->file("image");

            if ($image_obj->isValid()) {
                $img_path = $image_obj->store("articles", "customDisk");
            }
        }

        $article = new Article();

        $article->title = $request->input("title");
        $article->doctor_id  = Auth::guard("doctor")->user()->id;
        $article->description = $request->input("description");
        $article->image = $img_path;
        $article->save();

        return redirect()->route("doctor.articles.index")->with("successKey", "The article has been published successfully");
    }


    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $request->validate([
            "title" => "required|max:255",
            "description" => "required",
            "image" => "nullable",
        ]);

        $img_path = $article->image;
        if ($request->hasFile("image")) {
            Storage::disk("customDisk")->delete($article->image);
            $image_obj = $request->file("image");

            if ($image_obj->isValid()) {
                $img_path = $image_obj->store("articles", "customDisk");
            }
        }

        $article->title = $request->input("title");
        $article->doctor_id  = Auth::guard("doctor")->user()->id;
        $article->description = $request->input("description");
        $article->image = $img_path;
        $article->save();

        return redirect()->route("doctor.articles.index")->with("successKey", "The article has been Updated successfully");
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if ($article->image) {
            Storage::disk("customDisk")->delete($article->image);
        }
        $article->delete();
        return redirect()->route("doctor.articles.index")->with("failureKey", "The article has been Removed successfully");
    }
}
