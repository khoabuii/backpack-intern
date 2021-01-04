@extends('layouts.master')
@section('title','Trang chủ')
@section('content')
    <br>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Tin tức mới vừa cập nhật <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->

                    <div class="blog-list clearfix">

                        <hr class="invis">
                        @foreach($posts as $post)
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{url('/posts/'.$post->id.'')}}" title="">
                                        <img src="{{$post->image}}" alt="" height="500px" width="600px" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->
                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{url('/posts/'.$post->id.'')}}" title="">{{$post->title}}</a></h4>
                                <p> {{$post->summary}}</p>
                                @if($post->categories->parent)
                                <small class="firstsmall"><a class="bg-aqua" href="{{url('/category')}}" title="">{{$post->categories->parent->name}}</a></small>
                                @endif
                                <small class="firstsmall"><a class="bg-orange" href="{{url('/category')}}" title="">{{$post->categories->name}}</a></small>
                                <small><a href="#" title="">by Admin</a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> víews</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">
                        @endforeach

                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                                {{ $posts->links() }}
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <span>Đây là nơi đặt Banner quảng cáo</span>
                                <img src="upload/banner_07.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Bài viết Đặc biệt</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach($special_posts as $special)
                                    <a href="{{asset('posts/'.$special->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{$special->image}}" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">{{\Illuminate\Support\Str::limit($special->title, 25, $end='...') }}</h5>
                                            <small>{{$special->created_at}}</small>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Bài viết HOT</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach($hot_posts as $hot)
                                <a href="{{asset('posts/'.$hot->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{$hot->image}}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{\Illuminate\Support\Str::limit($hot->title, 25, $end='...') }}</h5>
                                        <small>{{$hot->created_at}}</small>
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
