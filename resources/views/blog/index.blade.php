@extends('app')

@section('content')
    <div class="container">
        <form action="{{ route('blog.store') }}" method="post">
            @csrf
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card w-50">
                    <div class="card-header text-center">Image URL</div>
                    <div class="card-body">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-text" id="image_url">@</span>
                            <input type="text" name="image_url" class="form-control" placeholder="Image URL"
                                aria-describedby="image_url">
                        </div>
                        @error('image_url')
                            <div class="small">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
