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
                                <h2>СММ вакансиялары</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="small-section-tittle2 mb-45">
                                    <div class="ion">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="12px">
                                            <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                                  d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                        </svg>
                                    </div>
                                    <h4>Жұмыс фильтері</h4>
                                    <h4 style="color:red">*барлығын бегілеу қажет</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <form method="GET" action="{{ route('jobs.find') }}">
                                @csrf
                                <!-- single one -->
                                <div class="single-listing">
                                    <div class="select-Categories pt-80 pb-50">
                                        <div class="small-section-tittle2">
                                            <h4>Job Type</h4>
                                        </div>
                                        <label class="container"> Full Time
                                            <input value="1" name="time" type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">Part Time
                                            <input value="0" name="time" type="checkbox" checked="checked active">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <!-- select-Categories End -->
                                </div>
                                <!-- single two -->
                                <div class="single-listing">
                                    <div class="small-section-tittle2">
                                        <h4>Companies</h4>
                                    </div>
                                    <!-- Select job items start -->
                                    <div class="select-job-items2">
                                        <select name="company">
                                            @foreach($comps as $comp)
                                                <option value="{{$comp->id}}">{{$comp->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="select-Categories pt-80 pb-50">
                                        <div class="small-section-tittle2">
                                            <h4>Experience</h4>
                                        </div>

                                        @foreach($exps as $exp)
                                            <label class="container">{{$exp['experience']}}
                                                <input name="experience" value="{{$exp['experience']}}" type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        @endforeach

                                    </div>
                                    <div class="select-Categories pt-80 pb-50">
                                        <div class="small-section-tittle2">
                                            <h4>Salaries</h4>
                                        </div>

                                        @foreach($salaries as $salary)
                                            <label class="container">{{$salary['salary']*430}}
                                                <input name="salary" value="{{$salary['salary']*430}}" type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        @endforeach

                                    </div>
                                    <!-- select-Categories End -->
                                </div>
                                <button type="submit" class="btn btn-danger">Search</button>
                            </form>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            @if(!empty($jobs))
                                                <span>{{$jobs->count()}} жұмыс табылды</span>
                                            @else
                                                <span style="color: red">Жұмыс табылмады</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                                @if(!empty($jobs))
                                    @foreach($jobs as $job)
                                        <div class="single-job-items mb-30">
                                            <div class="job-items">
                                                <div class="company-img">
                                                    <a href="{{route('jobs.details',$job->id)}}"><img
                                                            src="{{asset('img/icon/job-list1.png')}}" alt=""></a>
                                                </div>
                                                <div class="job-tittle job-tittle2">
                                                    <a href="{{route('jobs.details',$job->id)}}">
                                                        <h4>{{$job->name}}</h4>
                                                    </a>
                                                    <ul>
                                                        <li>{{$job->company_name}}</li>
                                                        <li><i class="fas fa-map-marker-alt"></i>{{$job->city}}</li>
                                                        <li style="color: green">{{$job->salary*430}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="items-link items-link2 f-right">
                                                @if($job->schedule == 1)
                                                    <a href="job_details.html">Full Time</a>
                                                @else
                                                    <a href="job_details.html">Party time</a>
                                                @endif

                                                <span>{{ $job->created_at->format('d.m.y')}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><span
                                                class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->

    </main>

@endsection
