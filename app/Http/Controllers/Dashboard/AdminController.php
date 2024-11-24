<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Interfaces\AdminInterface;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    private $adminInterface;

    public function __construct(AdminInterface $adminInterface){

        $this->adminInterface = $adminInterface;
    }


    public function index()
    {
        return $this->adminInterface->index();
    }

    public function create()
    {
        return $this->adminInterface->create();
    }

    public function store(AdminRequest $request)
    {
        return $this->adminInterface->store($request);
    }

    public function update(AdminRequest $request)
    {
        return $this->adminInterface->update($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->adminInterface->edit($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->adminInterface->destroy($request, $id);
    }
}
