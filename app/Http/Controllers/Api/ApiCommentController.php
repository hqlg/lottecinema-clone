<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class ApiCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return new CommentCollection($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $valdiatedRequest = $request->validated();
        if ($valdiatedRequest) {
            $newComment = Comment::create($valdiatedRequest);
            return (new CommentResource($newComment))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $valdiatedRequest = $request->validated();
        if ($valdiatedRequest) {
            $comment->update($valdiatedRequest);
            return new CommentResource($comment);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return new CommentResource($comment);
    }
}
