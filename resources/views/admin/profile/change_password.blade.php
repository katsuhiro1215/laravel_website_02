@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Change Password Page </h4>

                            @if(count($errors))
                              @foreach ($errors->all() as $error)
                              <p class="alert alert-danger alert-dismissible fade show">
                                {{ $error }}
                              </p>
                              @endforeach
                            @endif

                            <form method="POST" action="{{ route('admin.update.password') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input name="oldpassword" class="form-control" type="password" id="oldpassword">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input name="newpassword" class="form-control" type="password" id="newpassword">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input name="password_confirmation" class="form-control" type="password" id="password_confirmation">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Password">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
