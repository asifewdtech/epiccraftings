@extends('layouts.admin')
@section('title','Categories List')
@section('breadcrumb')
    <li><a href="{{route('categories.index')}}">Categories</a></li>
    <li class="active">List</li>
@endsection
@section('content')

    <div class="padd-top"><h3 class="text-center">Categories</h3></div>
    <div class="pr-4 text-right"><a href="{{route("categories.create")}}" class="btn btn-info btn-sm" >Create Categoory</a></div>

    <div class="box-body">
        <div class="col-xs-12 table-responsive">
            <table id="example1" class="table table-bordered table-striped"  data-ordering="false">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if($categories->count() >0)
                        @foreach($categories as $category)

                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <a href="{{ route('categories.edit',$category->id) }}">
                                        <button class="btn btn-inline btn-primary btn-sm">Update</button>
                                    </a>
                                        <button class="btn btn-inline btn-danger btn-sm" onclick="delete_resource('{{ route('categories.destroy',$category->id) }}','{{ route('categories.index') }}')">Delete</button>
                                </td>
                            </tr>

                        @endforeach
                    @endif
                
                </tbody>
            </table>
        </div>
    </div><!-- /.box-body -->

@endsection