@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center"
                     data-background="{{asset('img/hero/h1_hero.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Арманыңдағы жұмысты/смм-щикті тап!</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- form -->
                                <form action="#" class="search-box">
                                    <div class="input-form">
                                        <input type="text" placeholder="Job Tittle or keyword">
                                    </div>
                                    <div class="select-form">
                                        <div class="select-itms">
                                            <select name="select" id="select1">
                                                <option value="">Location BD</option>
                                                <option value="">Location PK</option>
                                                <option value="">Location US</option>
                                                <option value="">Location UK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="search-form">
                                        <a href="{{route('index.jobs')}}">Find job</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @auth()
            <div class="online-cv cv-bg section-overly pt-90 pb-120"
                 data-background="{{asset('img/gallery/cv_bg.jpg')}}">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="cv-caption text-center">
                                <p class="pera1">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                <p class="pera2">Жаңа вакансия ашу</p>
                                <a href="{{route('jobs.create')}}" class="border-btn2 border-btn4">ашу</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
        <!-- Online CV Area End-->
        <!-- Featured_job_start -->
        <section class="featured-job-area feature-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Recent Job</span>
                            <h2>Featured Jobs</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
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
                                        <a href="{{route('jobs.details',$job->id)}}">Full Time</a>
                                    @else
                                        <a href="{{route('jobs.details',$job->id)}}">Party time</a>
                                    @endif

                                    <span>{{ $job->created_at->format('d.m.y')}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured_job_end -->
        <!-- How  Apply Process Start-->
        <div class="apply-process-area apply-bg pt-150 pb-150"
             data-background="{{asset('img/gallery/how-applybg.png')}}">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <h2>Қалай жұмыс жасайды</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-search"></span>
                            </div>
                            <div class="process-cap">
                                <h5>Жұмысты ізде</h5>
                                <p>Өзіне қолайлы жұмысты ізде!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-curriculum-vitae"></span>
                            </div>
                            <div class="process-cap">
                                <h5>Өзіне қызық компанияны ізде</h5>
                                <p>Бізде 1000+ компания тіркелген!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="process-cap">
                                <h5>Арманыңдағы жұмысты тап!</h5>
                                <p>Жұмысты бізден іздеген қолайлы</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- How  Apply Process End-->
        <!-- Testimonial Start -->
        <div class="testimonial-area testimonial-padding">
            <div class="container">
                <!-- Testimonial contents -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">
                        <div class="h1-testimonial-active dot-style">
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="{{asset('img/testmonial/testimonial-founder.png')}}" alt="">
                                            <span>Margaret Lawson</span>
                                            <p>Java developer at Kaspi bank</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>Бұл сайт арқылы өзімінің арманымдағы жұмысты таптым, сайт ыңғайлы дизайны керемет!</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="{{asset('img/testmonial/testimonial-founder.png')}}" alt="">
                                            <span>Margaret Lawson</span>
                                            <p>Creative Director</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“I am at an age where I just want to be fit and healthy our bodies are our
                                            responsibility! So start caring for your body and it will care for you. Eat
                                            clean it will care for you and workout hard.”</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="{{asset('img/testmonial/testimonial-founder.png')}}" alt="">
                                            <span>Margaret Lawson</span>
                                            <p>Creative Director</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“I am at an age where I just want to be fit and healthy our bodies are our
                                            responsibility! So start caring for your body and it will care for you. Eat
                                            clean it will care for you and workout hard.”</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        <!-- Support Company Start-->
        <div class="support-company-area support-padding fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span>Біз не істейміз</span>
                                <h2>Бізде 20 000 вакансия бар!</h2>
                            </div>
                            <div class="support-caption">
                                <p class="pera-top">Бізде күн сайын 500 вакансия салынады!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            <img src="{{asset('img/service/support-img.jpg')}}" alt="">
                            <div class="support-img-cap text-center">
                                <span>1994</span>
                                <p>Бері</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Company End-->
        <!-- Blog Area Start -->
        <div class="home-blog-area blog-h-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>блог</span>
                            <h2>Біздің соңғы жаңалықтар</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="{{asset('img/blog/home-blog1.jpg')}}" alt="">
                                    <!-- Blog date -->
                                    <div class="blog-date text-center">
                                        <p>Лайфхак</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>24.04.22</p>
                                    <h3><a href="#">Қалай жұмыс іздеу керек</a>
                                    </h3>
                                    <a href="#" class="more-btn">Толығырақ »»</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="{{asset('img/blog/home-blog2.jpg')}}" alt="">
                                    <!-- Blog date -->
                                    <div class="blog-date text-center">
                                        <p>Жаңарту</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>| 25.04.22</p>
                                    <h3><a href="#">Енді жұмыстарды фильтр арқылы іздеуге болады</a>
                                    </h3>
                                    <a href="#" class="more-btn">Толығырақ »»</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->

    </main>

@endsection
