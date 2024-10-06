@extends('front.layouts.app')
@section('main')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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
                <div class="card border-0 shadow mb-4">
                <form method="POST" id="user_form" name="user_form">
                    <div class="card-body  p-4">
                        <h3 class="fs-4 mb-1">My Profile</h3>
                        <div class="mb-4">
                            <label for="" class="mb-2">Name*</label>
                            <input name="name" id="name" type="text" placeholder="Enter Name" class="form-control" value="{{$user->name}}">
                            <p></p>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Email*</label>
                            <input name="email" id="email" type="text" placeholder="Enter Email" class="form-control" value="{{$user->email}}">
                            <p></p>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Designation*</label>
                            <input name="designation" id="designation" type="text" placeholder="Designation" class="form-control" value="{{$user->designation}}">
                            <p></p>
                        </div> 
                        <div class="mb-4">
                            <label for="" class="mb-2">Mobile*</label>
                              <input name="mobile" id="mobile" type="text" placeholder="Mobile" class="form-control" value={{$user->mobile}}>
                              <p></p>
                        </div>                        
                    </div>
                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>

                <div class="card border-0 shadow mb-4">
                    <form method="POST" name="change_password_form" id="change_password_form">
                        <div class="card-body p-4">
                            <h3 class="fs-4 mb-1">Change Password</h3>
                            <div class="mb-4">
                                <label for="" class="mb-2">Old Password*</label>
                                <input name="old_password" id="old_password" type="password" placeholder="Old Password" class="form-control">
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">New Password*</label>
                                <input name="new_password" id="new_password" type="password" placeholder="New Password" class="form-control">
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Confirm Password*</label>
                                <input name="confirm_password" id="confirm_password" type="password" placeholder="Confirm Password" class="form-control">
                                <p></p>
                            </div>                        
                        </div>
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                  
                </div>                
            </div>
            
        </div>
    </div>
</section>


@endsection
@section('custom-js')
<script>
    $('#user_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('account.update') }}",
            type: 'PUT',
            dataType: 'json',
            data: $('#user_form').serialize(),
            success: function(response) {
                if (response.status == false) {
                    var errors = response.errors;
                    if (errors.name) {
                        $('#name').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.name);
                    } else {
                        $('#name').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }
                    if (errors.email) {
                        $('#email').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.email);
                    } else {
                        $('#email').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }
                    if (errors.designation) {
                        $('#designation').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.designation);
                    } else {
                        $('#designation').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }
                    if (errors.mobile) {
                        $('#mobile').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.mobile);
                    } else {
                        $('#mobile').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }
                } else {
                    // Handle success response if necessary
                    window.location = "{{ route('account.profile') }}";
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error if necessary
                console.error('AJAX Error:', status, error);
            }
        });
    });

    $('#change_password_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('account.update_password') }}",
            type: 'POST',
            dataType: 'json',
            data: $('#change_password_form').serialize(),
            success: function(response) {
                if (response.status == false) {
                    var errors = response.errors;
                    if (errors.old_password) {
                        $('#old_password').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.old_password);
                    } else {
                        $('#old_password').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }
                    if (errors.new_password) {
                        $('#new_password').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errors.new_password);
                    } else {
                        $('#new_password').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }
                    if (errors.confirm_password) {
                        let errorMessage = errors.confirm_password.find(error => error.includes('must be at least 8 characters') || error.includes('must match new password'));
                        $('#confirm_password').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errorMessage);
                    } else {
                        $('#confirm_password').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }
                } else {
                    // Handle success response if necessary
                    window.location = "{{ route('account.profile') }}";
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error if necessary
                console.error('AJAX Error:', status, error);
            }
        });
    });
</script>

@endsection
