<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Interfaces\PostInterface;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    private $postInterface;

    public function __construct(PostInterface $postInterface){

        $this->postInterface = $postInterface;
    }


    public function index()
    {
        return $this->postInterface->index();
    }

    public function create()
    {
        return $this->postInterface->create();
    }

    public function store(PostRequest $request)
    {
        return $this->postInterface->store($request);
    }

    public function update(PostRequest $request)
    {
        return $this->postInterface->update($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->postInterface->edit($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->postInterface->destroy($request, $id);
    }
}
