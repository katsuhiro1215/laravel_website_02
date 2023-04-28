@extends('admin.admin_master')

@section('admin')

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">ブログ編集画面</h4> <br><br>
                            <form method="POST" id="myForm" action="{{ route('blog.update', $blogs->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-8">
                                        <div class="row mb-3">
                                            <label for="title" class="form-label">タイトル</label>
                                            <div class="form-group">
                                                <input name="title" class="form-control" type="text" id="title" value="{{ $blogs->title }}">
                                                @error('blog_title')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="description" class="form-label">内容</label>
                                            <div class="form-group">
                                                <textarea id="elm1" name="description">{{ $blogs->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tags" class="form-label">タグ</label>
                                            <div class="form-group">
                                                <input name="tags" value="{{ $blogs->tags }}" class="form-control" type="text" id="tags" data-role="tagsinput"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row mb-3">
                                            <label for="category_name" class="form-label">カテゴリー名</label>
                                            <div class="form-group">
                                                <select name="blog_category_id" id="category_name" class="form-select">
                                                    <option selected="">選択してください。</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $blogs->blog_category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="image" class="form-label">アイキャッチ画像</label>
                                            <div class="form-group">
                                                <input type="file" name="image" class="form-control" id="image">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <img src="{{ asset($blogs->image) }}" alt="" id="showImage"
                                                    class="rounded avatar-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Insert Blog Category">更新する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
