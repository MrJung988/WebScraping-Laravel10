@extends('app')

@section('content')
    <div class="container">
        <form action="{{ route('blog.store') }}" method="post">
            @csrf
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card w-50">
                    <div class="card-header text-center">WebScrapping in Laravel with URL</div>
                    <div class="card-body">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-text {{ $errors->has('web_url') ? 'border-danger' : '' }}"
                                id="web_url">🔗</span>
                            <input type="text" name="web_url"
                                class="form-control {{ $errors->has('web_url') ? 'is-invalid' : '' }}"
                                placeholder="Enter Web URL" aria-describedby="web_url">
                        </div>
                        @error('web_url')
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
