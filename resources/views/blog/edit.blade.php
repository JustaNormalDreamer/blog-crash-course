@extends('layouts.master')

@section('title', 'Edit a Post')

@section('content')
    <section class="create__post my-5">
        <div class="container">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="">Edit Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                            @include('blog.form')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
