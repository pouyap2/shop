@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ویرایش دسته بندی</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('categories.update',$category)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <h5>دسته والد </h5>
                            <div class="controls">
                                <select name="category_id" id="category_id"  class="form-control">
                                    <option value="" disabled selected>دسته والد را انتخاب کنید</option>
                                    <option value=""  >دسته اصلی</option>
                                    @foreach($categories as $parent)
                                        <option  {{ $category->category_id === $parent->id ? "selected" : "" }} value="{{$parent->id}}">{{$parent->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>عنوان <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="title" value="{{$category->title}}" id="title" class="form-control"  data-validation-required-message="This field is required">
                            </div>
                        </div>
                        @if(count($errors->all()) >0)
                            <ul class="bg-danger p3 mt-3">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-info">ویرایش</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
