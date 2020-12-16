<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\Comment as CommentResource;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Comment;
use App\CommentsLike;


// use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArticleController extends Controller
{
    public function __construct() {

        // $this->middleware('auth');

        // $this->tasks = $tasks;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get some articles
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);

        // return collection of articles as a resoucre
        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Article::findOrFail($request->article_id) : new Article;

        $article->id = $request->input('article_id');
        $article->user_id = $request->get('user_id');
        // $article->user_id = 1;
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        if ($article->save()) {
            return new ArticleResource($article);
        }

        return null;
    }

    // post comment
    public function store_comment(Request $request)
    {
        // creating and fetching instance of coment table model
        $comment = $request->isMethod('put') ? Comment::findOrFail($request->article_id) : new Comment;

        // article comments count
        $article = Article::find($request->article_id);

        // updating article collunm
        $comments_count = $article->article_comments_count;
        $comments_count++;
        $article->article_comments_count = $comments_count;


        // fetching request data
        $comment->article_id = $request->input('article_id');
        $comment->user_id = $request->input('user_id');
        $comment->comment = $request->input('comment');

        // update article table comment_count table
        if ($comment->save()) {
            $article->save();
            // return new commentResource($comment);
        }

        // CommentsLike::create($likesData);

        return null;
        // return response()->json(['message' => 'success'], 200);
        // return response()->json([$request->all()]);
    }

    // fetch comments
    public function show_comments(Request $request, $id)
    {
        if($request->isMethod('get')) {
            // Get article
            $comments = Article::where('id', $id)->first()->comments()->paginate(3);

            // fetching comments
            // $comments = comment::where('article_id', $id)->paginate(3);
            // $comments = $article->comments;

            return CommentResource::collection($comments);

            // return $comments;
        }
    }

     // likes
    public function update(Request $request)
    {
        $comment = $request->isMethod('put') ? Comment::findOrFail($request->comment_id) : new Comment;
        $likeData = [
            "comment_id" => $request->comment_id,
            "user_id" => $request->user_id
        ];
        if($request->type == 'like') {
            // $vote++;
            $likes = $comment->likes;
            $likes++;
            $comment->likes = $likes;

            // check for double voting
            $user = $request->user_id;
            $comment_id = $request->comment_id;
            $commented = Commentslike::where('comment_id', $comment_id)->get();
            $commentExist = $commented->contains('user_id', $user);

           if(!$commentExist) {
            $comment->save();
            // update like comment data
            CommentsLike::create($likeData);
           }

        }
        else if($request->type == 'unlike') {
            $likes = $comment->likes;
            $likes--;
            $comment->likes = $likes;

            // check for double voting
            $user = $request->user_id;
            $comment_id = $request->comment_id;
            $commented = Commentslike::where('comment_id', $comment_id)->get();
            $commentExist = $commented->contains('user_id', $user);

            if(!$commentExist) {
               $comment->save();
            }

        }
        //    $comment->save();
        // if ($comment->save()) {
            // return new commentResource($comment);
        // }

        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ArticleResource
     */


    // show/store
    public function show(Request $request, $id)
    {
        if($request->isMethod('get')) {
            // Get article
        $article = Article::findOrFail($id);

        // fetching comments
        $comments = $article->comments;

        $poster = $article->user;

        return view('/singleArticle', ['article' => new ArticleResource($article), 'comments' => $comments, 'poster' => $poster]);

        } else {
            $comment = $request->isMethod('put') ? comment::findOrFail($request->comment_id) : new Comment;

            $comment->article_id = $request->input('article_id');
            $comment->user_id = $request->get('user_id');
            $comment->comment = $request->input('comment');
            dd($comment);
            if ($comment->save()) {
                // return new commentResource($comment);
            }

            return null;
        }
    }

    // sho article

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Get article
         $article = Article::findOrFail($id);

         if ($article->delete()) {
             return new ArticleResource($article);
         }

         return null;
    }
}
