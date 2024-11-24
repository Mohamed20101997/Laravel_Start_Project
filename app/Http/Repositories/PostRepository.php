<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PostInterface;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class PostRepository implements PostInterface
{


    /**
     * @var Post $postModel
     */
    private $postModel;

    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post){
        $this->postModel = $post;
    }

    public function index()
    {

    }//end of index function


    public function create()
    {
        return view('dashboard.posts.create');

    } //end of create function


    public function store($request)
    {
        try{
            $data = $request->except('_token');

            $this->postModel->create($data);

            session()->flash('success', 'Post added successfully');

            return redirect()->to(url('/dashboard'));


        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } //end of store function


    public function edit($request,$id)
    {
        $post = $this->postModel::find($id);

        if($post){
            return view('dashboard.posts.edit', compact('post'));
        }else{
            return redirect()->back()->with(['error'=>'this post is not found']);
        }

    } //end of edit function

    public function update( $request)
    {
        try{

            $post =  $this->postModel->find($request->id);
            $data = $request->except('_token');

            $post->update($data);

            session()->flash('success', 'Post Updated successfully');

            return redirect()->to(url('/dashboard'));


        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    } //end of update function

    public function destroy($request, $id)
    {
        try{
            $post =  $this->postModel->find($id);

            if(!$post)
            {
                return redirect()->back()->with(['error'=>'post not found']);
            }

            $post->delete();

            session()->flash('success', 'Post deleted successfully');

            return redirect()->to(url('/dashboard'));


        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function
}
