@extends('layouts.dashboard.app')

@section('content')
    <h1>Admins</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admins</a></li>
        <li class="breadcrumb-item" active>Edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form method="POST" action="{{ route('admin.update', $admin->id) }}" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$admin->id}}">
                    @csrf
                    @method('put')

                    <div class="row mt-4 ">
                        <div class="col-md-4">
                            {{-- name --}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Department Name" class="form-control" required value="{{ old('name',$admin->name) }}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col name --}}

                        <div class="col-md-4">
                            {{-- email --}}
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" placeholder="email" class="form-control" required value="{{ old('email',$admin->email) }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col email --}}
                    </div> {{-- end of row --}}

                    <div class="row mt-2">

                        <div class="col-md-4">
                            {{-- Password --}}
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="password" name="password"  class="form-control" placeholder="Password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password --}}

                        {{-- Password --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>confirm Password <span class="text-danger">*</span></label>
                                <input type="password" name="confirm-password"  class="form-control"
                                    placeholder="confirm Password" value="{{ old('confirm-password') }}">
                                @error('confirm-password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password --}}
                    </div> {{-- end of row --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
                    </div>
                </form>

            </div> {{-- end of tile  --}}

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}


@endsection

