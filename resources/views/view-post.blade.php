@extends('layouts.master')
@section('title','')
@section('content')
    @if(session('success'))
        <script !src="">
            alert('{{session('success')}}');
        </script>
    @endif
    <section class="section single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area text-center">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$post->categoriesChild->name}}</a></li>
                                <li class="breadcrumb-item active">{{$post->title}}</li>
                            </ol>

                            <span class="color-orange"><a href="" title="">{{$post->categoriesChild->name}}</a></span>

                            <h3>{{$post->title}}</h3>

                            <div class="blog-meta big-meta">
                                <small><a href="tech-single.html" title="">{{$post->created_at}}</a></small>
                                <small><a href="tech-author.html" title="">by Admin</a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->

                        <div class="single-post-media">
                            <img src="{{url($post->image)}}" width="50%" alt="" class="img-fluid">
                        </div><!-- end media -->

                        <div class="blog-content">
                            {!! $post->content !!}
                        </div><!-- end content -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title"> Bình luận</h4>
                            <span style="color: yellowgreen">
                                Vui lòng Đăng nhập để bình luận
                            </span>
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach($comments as $com)
                                    <div class="comments-list">
                                        <div class="media">
                                             <div class="media-body">
                                                <h4 class="media-heading user_name">{{$com->user->name}} <small>{{$com->created_at}}</small></h4>
                                                <p>{{$com->content}}</p>
{{--                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>--}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">

                        @auth
                        <div class="custombox clearfix">
                            <h4 class="small-title">Leave a Reply</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{url('comment/'.$post->id)}}" class="form-wrapper" method="post">
                                        @csrf
                                        <textarea class="form-control" name="content" placeholder="Your comment"></textarea>
                                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="banner-spot clearfix">
                                <div class="banner-img"> Banner Quang cao
                                    <img src="{{url('upload/banner_07.jpg')}}" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title"> Bài viết nổi bật</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    @foreach($posts_list as $list)
                                    <a href="{{url('posts/'.$list->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{$list->image}}" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">{{ \Illuminate\Support\Str::limit($list->title, 25, $end='...') }}</h5>
                                            <small>{{$list->created_at}}</small>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Follow Us</h2>

                            <div class="row text-center">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button facebook-button">
                                        <i class="fa fa-facebook"></i>
                                        <p>27k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button twitter-button">
                                        <i class="fa fa-twitter"></i>
                                        <p>98k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button google-button">
                                        <i class="fa fa-google-plus"></i>
                                        <p>17k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button youtube-button">
                                        <i class="fa fa-youtube"></i>
                                        <p>22k</p>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end widget -->

                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
