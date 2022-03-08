@extends('layouts.master-layouts-landing')
@section('title')
    @lang('translation.Home')
@endsection
@section('content')
    <div>
        <div class="search-section d-flex justify-content-center align-items-center" style="background-image: url('public/assets/images/background/landing.jpg'); background-size: cover; background-repeat: no-repeat">
            <div>
                <div class="d-flex justify-content-center align-items-center text-center">
                    <h1 class="search-header" >Stunning free images & royalty free stock</h1>
                </div>
                <div class="d-flex justify-content-center align-items-center text-center">
                    <h4 class="search-subheader d-sm-hide">Over 2.5 million+ high quality stock images, videos and music shared by our talented community</h4>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="position-relative" id="searchbox">
                        <input type="text" class="search-form-input" placeholder="Search Images, vectors, videos and music" >
                        <i class="fas fa-search font-size-18 inner-icon-search"></i>
                        <div class="inner-select-type">
                            <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5"
                                data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="text-muted">Image<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                                <a class="dropdown-item" href="#">Image</a>
                                <a class="dropdown-item" href="#">Vector</a>
                                <a class="dropdown-item" href="#">Video</a>
                                <a class="dropdown-item" href="#">Audio</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center text-center">
                    <p class="search-description d-sm-hide">Popular searches: background, wallpaper, nature, love, flowers, sky, flower, cat, dog, heart, money, food, cronovirus</p>
                </div>
            </div>
        </div>

        <div class="pd-top-10">
            <div class="">
                <ul class="image-gallery">
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/41.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title "><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>                        
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/1.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a> <a type='button' href="" class="overlay-text">animal</a> <a type='button' href="" class="overlay-text">root</a> <a type='button' href="" class="overlay-text">fbodyinch</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/2.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/3.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/4.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/25.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/26.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/28.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/42.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/43.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/44.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/45.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/46.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/47.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/48.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/49.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/50.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/51.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/26.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/30.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/36.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/27.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/29.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/37.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/38.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/39.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/40.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/52.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/53.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="gallery-content">
                            <a href="{{url('media-detail')}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ URL::asset('public/assets/images/gallery/54.jpg') }}">
                                <div class="content-details fadeIn-bottom">
                                <div class="" style="float:right;">
                                    <p class="content-text"><i class="fas fa-heart"></i> 31 &nbsp; <i class="fas fa-comment"></i> 12 &nbsp; <i class="fas fa-bookmark"></i> </p>
                                </div>
                                <div class="" style="float:left;">
                                    <h2 class="content-title"><a type='button' href="" class="overlay-text">finch</a> <a type='button' href="" class="overlay-text">bird</a></h2>
                                </div>
                                
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="text-center container" style="padding-top: 30px; padding-bottom: 100px;">
            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light px-4">Discover more</button>

            <h1 class="search-header" style="margin-top: 100px;">Free Images, videos and music you can use anywhere</h1>
            <p class="search-description font-size-16">Polymesa is a vibrant community of creatives, sharing copyright fee images, videos and music. All contents are rleased under the Polymesa License, which makes them safe to use without asking for permission or giving crediet to the artist-even for commericial purposes.</p>
            <p class="text-success font-size-16">Learn more...</p>


            <h1 class="search-header" style="margin-top: 100px;">Join Polymesa</h1>
            <p class="search-description font-size-16">Download royalty free photos, videos and music. Share your own pictures as public domain with people all over the world.</p>
            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light px-4">Sign up, It's free!</button>
        </div>

    </div>
@endsection
