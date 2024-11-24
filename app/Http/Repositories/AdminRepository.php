<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AdminInterface;
use App\Models\Admin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements AdminInterface
{


    /**
     * @var Admin $adminModel
     */
    private $adminModel;

    /**
     * AdminRepository constructor.
     * @param Admin $admin
     */
    public function __construct(Admin $admin){
        $this->adminModel = $admin;
    }

    public function index()
    {
        $authId = auth()->user()->id ;
        $admins = $this->adminModel::whereNot('id', $authId)->whenSearch(request()->all())->orderBy('id','desc')->simplePaginate(5);
        return view('dashboard.admins.index',compact('admins'));

    }//end of index function


    public function create()
    {

        return view('dashboard.admins.create');

    } //end of create function


    public function store($request)
    {
        try{
            $data = $request->except('_token');

            $data['password'] = Hash::make($data['password']);
            $this->adminModel->create($data);

            session()->flash('success', 'Admin added successfully');

            return redirect()->route('admin.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } //end of store function


    public function edit($request,$id)
    {
        $admin = $this->adminModel::find($id);

        if($admin){
            return view('dashboard.admins.edit', compact('admin'));
        }else{
            return redirect()->back()->with(['error'=>'this admin is not found']);
        }

    } //end of edit function

    public function update( $request)
    {
        try{

            $admin =  $this->adminModel->find($request->id);
            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = Hash::make($data['password']);
            }else{
                $data = Arr::except($data,array('password'));
            }

            $admin->update($data);

            session()->flash('success', 'Admin Updated successfully');

            return redirect()->route('admin.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    } //end of update function

    public function destroy($request, $id)
    {
        try{
            $admin =  $this->adminModel->find($id);

            if(!$admin)
            {
                return redirect()->back()->with(['error'=>'admin not found']);
            }

            $admin->delete();

            session()->flash('success', 'Admin deleted successfully');

            return redirect()->route('admin.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    } // end of destroy function
}
