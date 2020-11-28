@extends('layouts.master')

@section('title', "Blog | $post->title")

@section('content')
    <section class="single__post my-5">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="image">
                        <img src="{{ asset('image/blackhole.png') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="content my-3">
                        <h3>{{ $post->title }}</h3>
                        <ul class="list-inline">
                            <li class="list-inline-item">Created At: {{ $post->created_at->diffForHumans() }}</li>
                            <li class="list-inline-item">Updated At: {{ $post->updated_at->diffForHumans() }}</li>
                        </ul>
                        <p>{{ $post->description }}</p>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-success">Edit</a>

                    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
