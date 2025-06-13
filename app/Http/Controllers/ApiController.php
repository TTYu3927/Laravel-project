<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Post;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Api::all();
        if ($request->wantsJson()) {
            return response()->json([
                'status' => true,
                'message' => "This is not the home route",
                'data' => $posts,
            ]);
        }
        return view('posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'body' => 'required|string',
            ]);
            if ($validator->fails()){
                return response()->json([
                    "status" => false,
                    "message" => "Validation failed",
                    "errors" => $validator->errors()->all()
                ]);
            }
            $api = Api::create([
                'title' => $request->title,
                'body' => $request->body
            ]);

            return response()->json([
                "status" => 1,
                "message" => "API created successfully",
                "data" => $api
            ], 201);
        }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $api = Api::find($id);

        return response()->json([
            "status" => 1,
            "message" => "post return",
            "data" => $api,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        if ($validator->fails()){
            return response()->json([
                "status" => false,
                "message" => "Validation failed",
                "errors" => $validator->errors()->all()
            ]);
        }
        $api = Api::find($id);
        $api->title = $request->title;
        $api->body = $request->body;
        $api->save();
        
        return response()->json([
            "status" => 1,
            "message" => "API updated successfully",
            "data" => $api
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $api = Api::find($id);
        $api->delete();
        return response()->json([
            "status" => 1,
            "message" => "API deleted successfully",
        ]);
    }
}
