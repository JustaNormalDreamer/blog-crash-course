@extends('layouts.master')

@section('title', 'Blog')

@section('content')
    <section class="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="heading my-md-5">
                        <h3 class="font-weight-bolder">From Our Blog</h3>
                    </div>

                    @foreach($posts as $post)
                    <article class="">
                        <div class="date">
                            <h3 class="">{{ $post->created_at->format('M d, Y') }}</h3>
                        </div>
                        <img src="{{ asset('image/blackhole.png') }}" alt="" class="img-fluid" />
                        <div class="content">
                            <ul>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Design</a></li>
                                <li><a href="">Life</a></li>
                            </ul>
                            <h3 class="post-heading">
                                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="">{{ $post->description }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="read-more-btn">Continue Reading</a>
                        </div>
                    </article>
                    @endforeach

                    <div class="load-more text-center my-2">
                        <button class="btn btn-outline-primary btn-lg">Load More</button>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="about bg-gray p-4 my-4">
                            <h3 class="">About Us</h3>
                            <div class="my-3">
                                <img src="image/flower.png" alt="" class="img-fluid" />
                            </div>

                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores aperiam
                                voluptatum corporis totam voluptates distinctio ad ducimus, ea, veritatis dolore quia
                                nam autem ut! Velit repudiandae, laborum cumque rerum distinctio harum. Porro quis aut,
                                magni dignissimos incidunt repellendus iure quam excepturi illo, ipsum facilis a est
                                cupiditate saepe, non totam.</p>
                        </div>

                        <div class="links bg-gray p-4 my-4">
                            <h3 class="">Archives</h3>
                            <ul>
                                <li><a href="">June 2017</a></li>
                                <li><a href="">April 2017</a></li>
                                <li><a href="">March 2017</a></li>
                                <li><a href="">June 2017</a></li>
                                <li><a href="">April 2017</a></li>
                                <li><a href="">March 2017</a></li>
                            </ul>
                        </div>

                        <div class="links bg-gray p-4 my-4">
                            <h3 class="">Categories</h3>
                            <ul>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Design</a></li>
                                <li><a href="">Life</a></li>
                                <li><a href="">News</a></li>
                                <li><a href="">Originals</a></li>
                                <li><a href="">Photography</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
