@extends('front.layouts.app')
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('front.account.sidebar')
                </div>

                <div class="col-lg-9">
                    @include('front.account.message')
                        
                    <div class="card border-0 shadow mb-4 ">
                        <form method="POST" id="editJobForm" name="editJobForm">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Edit Job Details</h3>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Title<span class="req">*</span></label>
                                    <input type="text" placeholder="Job Title" id="title" name="title"
                                        class="form-control" value="{{$job->title}}">
                                        <p></p>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="" class="mb-2">Category<span class="req">*</span></label>
                                    <select name="category" id="category" class="form-control">
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <option {{$job->category->id == $category->id ? 'selected': ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @else
                                        @endif


                                    </select>
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Job Nature<span class="req">*</span></label>
                                    <select name="jobType" id="jobType" class="form-select">
                                        @if ($job_types->isNotEmpty())
                                            @foreach ($job_types as $job_type)
                                                <option {{$job->job_type_id == $job_type->id ? 'selected': ''}} value="{{ $job_type->id }}">{{ $job_type->name }}</option>
                                            @endforeach
                                        @else
                                        @endif
                                       

                                    </select>
                                    <p></p>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                    <input value="{{$job->vacancy}}" type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy"
                                        class="form-control">
                                        <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Salary</label>
                                    <input type="text" value="{{$job->salary}}" placeholder="Salary" id="salary" name="salary"
                                        class="form-control">
                                        <p></p>
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Location<span class="req">*</span></label>
                                    <input value="{{$job->location}}" type="text" placeholder="location" id="location" name="location"
                                        class="form-control">
                                        <p></p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-2">Description<span class="req">*</span></label>
                                <textarea class="form-control" name="description" id="description" cols="5" rows="5"
                                    placeholder="Description">{{$job->description}}</textarea>
                                    <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Benefits</label>
                                <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{$job->benefits}}</textarea>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Responsibility</label>
                                <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5"
                                    placeholder="Responsibility">{{$job->responsibility}}</textarea>
                                    <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Qualifications</label>
                                <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5"
                                    placeholder="Qualifications">{{$job->qualifications}}</textarea>
                                    <p></p>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-2">Experience</label>
                                <select name="experience" id="experience" class="form-control">
                                    @for ($i = 0; $i <= 10; $i++)
                                    <option {{$job->experience == $i ? 'selected': ''}} value="{{$i}}">{{$i}}</option>
                                    @endfor
                                    <option value="10_plus">10+ Year</option>
                                </select>
                                <p></p>
                            </div>



                            <div class="mb-4">
                                <label for="" class="mb-2">Keywords</label>
                                <input value="{{$job->keywords}}" type="text" placeholder="keywords" id="keywords" name="keywords"
                                    class="form-control">
                                    <p></p>
                            </div>

                            <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Name<span class="req">*</span></label>
                                    <input value="{{$job->company_name}}" type="text" placeholder="Company Name" id="company_name"
                                        name="company_name" class="form-control">
                                        <p></p>
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Location</label>
                                    <input value="{{$job->company_location}}" type="text" placeholder="Location" id="company_location"
                                        name="company_location" class="form-control">
                                        <p></p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-2">Website</label>
                                <input type="text" placeholder="Website" id="company_website" name="company_website"
                                    class="form-control">
                                    <p></p>
                            </div>
                        </div>
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">Edit Job</button>
                        </div>
                        </form>
                    </div>


                    <div class="card border-0 shadow mb-4">


                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script type="text/javascript">
        $("#editJobForm").submit(function(e) {
            e.preventDefault();
            // console.log($("#createJobForm").serializeArray());
            // return false;
            $.ajax({
                url: "{{ route('account.updateJob', $job->id) }}",
                type: 'POST',
                dataType: 'json',
                data: $('#editJobForm').serializeArray(),
                success: function(response) {
                    if (response.status == true) {
                        $('#title').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $('#category').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $('#jobType').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $('#vacancy').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $('#location').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $('#description').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $('#company_name').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
                        window.location.href = '{{ route('account.myJobs') }}';
                        //If User data successfully updated
                    } else {
                        var errors = response.errors;
                        if (errors.title) {
                            $('#title').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.title)
                        } else {
                            $('#title').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.category) {
                            $('#category').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.category)
                        } else {
                            $('#category').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.jobType) {
                            $('#jobType').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.jobType)
                        } else {
                            $('#jobType').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.vacancy) {
                            $('#vacancy').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.vacancy)
                        } else {
                            $('#vacancy').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.location) {
                            $('#location').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.location)
                        } else {
                            $('#location').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.description) {
                            $('#description').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.description)
                        } else {
                            $('#description').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.company_name) {
                            $('#company_name').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.company_name)
                        } else {
                            $('#company_name').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    }
                }
            });
        });
    </script>
@endsection
