@extends('layouts.dashboard.app')

@section('content')
    <h1>Posts</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$post->id}}">
                    @csrf
                    @method('put')

                    <div class="row mt-4 ">
                        <div class="col-md-4">
                            {{-- title --}}
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span> </label>
                                <input type="text" name="title" placeholder="title" class="form-control" required value="{{ old('title' , $post->title) }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col title --}}

                        <div class="col-md-6">
                            {{-- Content --}}
                            <div class="form-group">
                                <label>Content <span class="text-danger">*</span></label>
                                <textarea name="content" placeholder="Content" class="form-control" required>{{ old('content', $post->content) }}</textarea>
                                @error('Content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Content --}}

                    </div> {{-- end of row --}}

                    <div class="row mt-2">

                        <div class="col-md-4">
                            {{-- Author --}}
                            <div class="form-group">
                                <label>Author <span class="text-danger">*</span></label>
                                <input type="text" name="author"  class="form-control"  required placeholder="Author" value="{{ old('Author', $post->content) }}">
                                @error('Author')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Author --}}

                        {{-- published_at --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Published At </label>
                                <input type="date" name="published_at"  class="form-control" placeholder=" published_at" value="{{ old('published_at', $post->published_at) }}">
                                @error('published_at')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col published_at --}}
                    </div> {{-- end of row --}}


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
                    </div>
                </form>

            </div> {{-- end of tile  --}}

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}


@endsection

