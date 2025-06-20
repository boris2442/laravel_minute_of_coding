<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
//importation du model Article
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class BlogController extends Controller
{
    //
    public function readCategories()
    {
        $categories = Category::all();
        // Logique pour lire une catégorie par son slug
        // Par exemple, récupérer la catégorie depuis la base de données
        // et retourner une vue avec les articles de cette catégorie.
        return view('blog.create', compact('categories'));
    }

    // public function createArticle(Request $request)
    // {
    //     $validateData = $request->validate([
    //         'title' => 'required|string|max:255',

    //         'description' => 'required|string',
    //         'category' => 'required|string|max:255',
    //         'image' => 'nullable|image|mimes:jpeg,jpg,svg,gif|max:2048',
    //     ]);
    //     $category = Category::firstOrCreate(
    //         [
    //             'name' => $validateData['category']

    //         ]
    //     );
    //     $validateData['category'] = $category->id;

    //     //verification si une image a ete envoyer
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('images'), $imageName);
    //         $validateData['image'] = 'images/' . $imageName;
    //     } else {
    //         $validateData['image'] = null; // ou une valeur par défaut
    //     }
    //     $validateData['author_id'] = Auth::id();
    //     Article::create($validateData);
    //     return redirect()->route('dashboard')->with('success', 'Article crrer avec success');
    // }

    public function createArticle(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,svg,gif,png|max:2028',
        ]);

        $category = Category::firstOrCreate(['name' => $validateData['category']]);
        $validateData['category_id'] = $category->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validateData['image'] = 'images/' . $imageName;
        } else {
            $validateData['image'] = null;
        }

        $validateData['author_id'] = Auth::id();

        // Supprime le champ 'category' du tableau
        unset($validateData['category']);

        Article::create($validateData);

        return redirect()->route('dashboard')->with('success', 'Article créé avec succès');
    }

    public function dashboardArticle()
    {
        $articles = Article::where('author_id', Auth::id())->get();
        return view('dashboard', compact('articles'));
    }

     public function deleteArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('dashboard')->with('success', 'article destroy with success');
    }
}
