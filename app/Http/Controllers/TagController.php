<?php


namespace App\Http\Controllers;


use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TagController extends Controller
{
    public function index()
    {
        // Fetch all tags from the database
        $tags = Tag::all();


        // Return the view with the tags data
        return view('posts.tag.index', compact('tags'));
    }


    public function create()
    {
        // Return the view to create a new tag
        return view('posts.tag.create');
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'tag_name' => 'required|string|max:255',
            'tag_desc' => 'nullable|string',
        ]);


        // Create a slug from the tag name
        $slug = Str::slug($request->tag_name);


        // Check if the slug already exists
        Tag::create([
            'tag_name' => $request->tag_name,
            'tag_slug' => $slug,
            'tag_desc' => $request->tag_desc,
        ]);


        // Check if the tag was created successfully
        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }


    public function show(Tag $tag)
    {
        //view the tag details
        return view('posts.tag.show', compact('tag'));
    }


    public function edit(Tag $tag)
    {
        // Return the view to edit the tag
        return view('posts.tag.edit', compact('tag'));
    }


    public function update(Request $request, Tag $tag)
    {
        // Validate the request data
        $request->validate([
            'tag_name' => 'required|string|max:255',
            'tag_desc' => 'nullable|string',
        ]);


        // Check if the slug already exists
        $slug = Str::slug($request->tag_name);


        // Update the tag in the database
        $tag->update([
            'tag_name' => $request->tag_name,
            'tag_slug' => $slug,
            'tag_desc' => $request->tag_desc,
        ]);


        // Check if the tag was updated successfully
        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }


    public function destroy(Tag $tag)
    {
        // Delete the tag from the database
        $tag->delete();
        // Check if the tag was deleted successfully
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
