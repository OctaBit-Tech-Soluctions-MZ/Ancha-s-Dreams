<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Models\Category;
use App\Models\Content;
use App\Models\Recipe;
use App\Services\UploadService;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index() {
        $recipes = Recipe::paginate(6);
        $categories = Category::all('name');
        return view('recipes', compact('recipes', 'categories'));
    }

    public function list() {
        $recipes = Recipe::paginate(6);
        return view('instructor.recipes', compact('recipes'));
    }

    public function register() {
        $categories = Category::all('name');
        return view('instructor.recipes.register', compact('categories'));
    }
    public function edit($slug) {
        $recipe = Recipe::where('slug',$slug)->firstOrFail();
        $categories = Category::all();
        return view('instructor.recipes.edit', compact('recipe', 'categories'));
    }

    public function store(RecipeRequest $request, $slug = '') {
        
        $recipe = new Recipe();
        $recipe->title = $request->title;
        $recipe->preparation_method = $request->preparation_method;
        $recipe->preparation_time = $request->preparation_time .' '.$request->time;
        $recipe->rendimento = $request->rendimento;
        $recipe->category = $request->categories;

        // Verifica se a receita esta associada a uma aula/curso
        if (!empty($slug)) {
            $recipe->is_associate_course = 1;
            $lesson_id = Content::where('slug', $slug)->get()->id;
            $recipe->associate_by = $lesson_id;
        }

        // verifica se o file image esta vazio em caso de updates
        if ($request->hasFile('image')) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
            $recipe->image_path = UploadService::upload($request->file('image'), 'assets/img/recipes', 
                    'default.png', $allowedExtensions);
        }
        $recipe->save();
        return redirect()->route('instructor.recipes')->with('success', 'Receita registada com sucesso');
    }

    public function update(RecipeRequest $request, $slug, $slug_lesson = '') {

        $message = 'Receita Actualizada com sucesso';
        
        $recipe = Recipe::where('slug', $slug)->first();
        $recipe->title = $request->title;
        $recipe->preparation_method = $request->preparation_method;
        $recipe->preparation_time = $request->preparation_time .' '.$request->time;
        $recipe->rendimento = $request->rendimento;
        $recipe->category = $request->categories;

        // Verifica se a receita esta associada a uma aula/curso
        if (!empty($slug_lesson)) {
            $recipe->is_associate_course = 1;
            $lesson_id = Content::where('slug', $slug_lesson)->get()->id;
            $recipe->associate_by = $lesson_id;
        }

        // verifica se o file image esta vazio em caso de updates
        if ($request->hasFile('image')) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
            $recipe->image_path = UploadService::upload($request->file('image'), 'assets/img/recipes', 
                    'default.png', $allowedExtensions);
        }
        $recipe->save();
        return redirect()->route('instructor.recipes')->with('success', $message);
    }

    public function destroy($slug)
    {
        Recipe::where('slug',$slug)->firstOrFail()->delete();
        return redirect()->route('instructor.recipes')->with('success', 'Receita removida com sucesso');
    }
}
