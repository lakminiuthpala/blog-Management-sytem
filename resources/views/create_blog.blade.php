@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="form-group mt-4">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('blogs.index')}}">
                        <button class="btn btn-primary float-right btn-sm"> My Blog List</button>
                    </a>
                </div>
                <div class="card-body">
                <form
                        action="{{route('blogs.store')}}"
                        method="post" id="note-form">
                        @csrf
                        @if(isset($blog))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="col-form-label">Title
                                    <span class="text-red">*</span></label>
                            </div>
                            <div class="form-group col-md-8">
                                <input class="form-control" name="title" id="title" type="text"
                                       value="{{isset($blog)?$blog->title:old('title')}}" required>
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="col-form-label">Content
                                    <span class="text-red">*</span></label>
                            </div>
                            <div class="form-group col-md-8">
                                <textarea class="form-control" name="content" id="content" required>
                                    @if ($errors->has('content'))
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                    @endif
                                </textarea>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="col-form-label">Published Date
                                    <span class="text-red">*</span></label>
                            </div>
                            <div class="form-group col-md-2">
                                <input class="form-control" name="publish_date" id="title" type="date" required
                                       value="{{isset($blog)?$blog->publish_date:old('publish_date')}}" min="<?php echo date('Y-m-d'); ?>>
                                @if ($errors->has('publish_date'))
                                    <span class="text-danger">{{ $errors->first('publish_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="btn btn-primary float-right btn-sm">Save Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


