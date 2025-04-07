<?php


namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories from the database
        $categories = Category::all();
        // Return the view with the categories data
        return view('posts.category.index', compact('categories'));
    }


    public function create()
    {
        // Return the view to create a new category
        return view('posts.category.create');
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'cat_name' => 'required|string|max:255',
            'cat_desc' => 'nullable|string',
        ]);


        // Create a slug from the category name
        $slug = Str::slug($request->cat_name);


        // Check if the slug already exists
        Category::create([
            'cat_name' => $request->cat_name,
            'cat_slug' => $slug,
            'cat_desc' => $request->cat_desc,
        ]);


        // Check if the category was created successfully
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }


    public function show(Category $category)
    {
        // View the category details
        return view('posts.category.show', compact('category'));
    }


    public function edit(Category $category)
    {
        // Return the view to edit the category
        return view('posts.category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'cat_name' => 'required|string|max:255',
            'cat_desc' => 'nullable|string',
        ]);


        // Create a slug from the category name
        $slug = Str::slug($request->cat_name);


        // Check if the slug already exists
        $category->update([
            'cat_name' => $request->cat_name,
            'cat_slug' => $slug,
            'cat_desc' => $request->cat_desc,
        ]);


        // Check if the category was updated successfully
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }


    public function destroy(Category $category)
    {
        // Delete the category from the database
        $category->delete();


        // Check if the category was deleted successfully
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
