<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //las pueden ver todos
        $category = Category::all();
        return $category;
    }

    public function store(Request $request)
    {
        $field = $request->validate([
            'name' => 'required|string|max:25|unique:category',
            'description' => 'required|string|max:50'
       ]);

       $category = Category::create($field);
       return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        try {

            $category = Category::where('id', $id);
            if (!$category) {
                return response()->json(['error' => 'Category not found']);
            }

            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return response()->json(['message' => 'category edited successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => 'An error ocurrerd: ' . $e->getMessage()]);
        }
    }

    public function show () {

        

    }
}
