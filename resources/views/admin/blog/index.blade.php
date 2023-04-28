@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">ブログ記事一覧</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">ブログ記事一覧</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Blog Category</th>
                                        <th>Blog Title</th>
                                        <th>Blog Tags</th>
                                        <th>Blog Image</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item['category']['name'] }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->tags }}</td>
                                            <td>
                                              <img src="{{ asset($item->image) }}" alt="" width="60px" height="50px">
                                            </td>
                                            <td>
                                                <a href="{{ route('blog.edit', $item->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('blog.delete', $item->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                        class="fas fa-trash-alt"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
