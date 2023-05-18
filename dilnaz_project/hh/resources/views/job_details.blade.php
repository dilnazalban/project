@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                 data-background="{{asset('img/hero/about.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>{{$job->name}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="{{asset('img/icon/job-list1.png')}}" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>{{$job->name}}</h4>
                                    </a>
                                    <ul>
                                        <li>{{$job->company_name}}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{$job->city}}</li>
                                        <li>{{$job->salary*430}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- job single End -->

                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <p>{{$job->description}}</p>
                            </div>


                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Overview</h4>
                            </div>
                            <ul>
                                <li>Posted date : <span>{{$job->created_at->format('d.m.y')}}</span></li>
                                <li>Location : <span>{{$job->city}}</span></li>
                                <li>Vacancy : <span>{{$job->category->name}}</span></li>
                                <li>Job nature : <span>@if($job->schedule==1)
                                            Full time
                                        @else
                                            Party time
                                        @endif</span></li>
                                <li>Salary : <span>{{$job->salary*430}}</span></li>
                                <li>Deadline : <span>expires in {{$job->created_at->format('d')+10}} day </span></li>
                            </ul>
                            <div class="apply-btn2">
                                <a href="#" class="btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>

@endsection
