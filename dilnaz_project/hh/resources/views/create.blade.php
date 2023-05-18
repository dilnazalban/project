@extends('layouts.app')

@section('content')
    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success my-4">Dear! {{\Illuminate\Support\Facades\Auth::user()->name}} company</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('jobs.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Job name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control" name="name"
                                            required autocomplete="name" autofocus>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">График вакансии</label>

                                <div class="col-md-6">
                                    <select name="schedule" class="form-select" aria-label="Default select example">
                                        <option selected value="1">Full-time</option>
                                        <option value="0">Part time</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="salary" class="col-md-4 col-form-label text-md-end">Salary <p style="color: red;font-size: 12px;">*please insert in USD</p></label>
                                <div class="col-md-6">
                                    <input id="salary" value="500" type="number"
                                           class="form-control" name="salary"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="experience" class="col-md-4 col-form-label text-md-end">Experience (year)</label>
                                <div class="col-md-6">
                                    <input placeholder="1 year+" id="experience" type="number"
                                           class="form-control" name="experience"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">City</label>
                                <div class="col-md-6">
                                    <input placeholder="Kazakhstan,Almaty..." id="city" type="text"
                                           class="form-control" name="city"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Job description (write also about company and job requirements)</label>
                                <div class="col-md-6">
                                    <textarea id="description" type="text"
                                              rows="12"
                                           class="form-control" name="description"
                                           required >
                                    </textarea>
                                </div>
                            </div>


                            <button class="btn btn-primary">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
