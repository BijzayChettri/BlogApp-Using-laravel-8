@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/post">
                {{ csrf_field() }}

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                     @endif
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Post</label>
                    <textarea class="form-control" name="body"  id="exampleFormControlTextarea1" rows="3"></textarea>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('body') }}</span>
                     @endif
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
