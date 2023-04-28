@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">ブログカテゴリー作成画面</h4> <br><br>
                            <form method="POST" action="{{ route('blog_category.update', $blogcategory->id) }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">カテゴリー名</label>
                                    <div class="form-group col-sm-10">
                                        <input name="name" class="form-control" type="text"
                                            id="name" value="{{ $blogcategory->name }}">
                                            @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Blog Category">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
