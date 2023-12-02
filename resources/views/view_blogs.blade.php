@extends('layouts.public_app')

@section('content')
    <div class="container-fluid">
        <div class="form-group mt-4">
            <div class="card">
                <div class="card-header">
                    
                </div>
                <div class="card-body">
                
                        <div class="row">
                            <?php print_r($data->user_id);?>
                            <div class="form-group col-md-8">
                                <h1>{{$data->title}}</h1>
                                
                            </div>

                        </div>
                        <div class="row">
                            
                            <div class="form-group col-md-8">
                                <p>{{$data->content}}</p>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                            </div>
                            <div class="form-group col-md-4">
                            <label class="col-form-label">Author
                                    </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                            </div>
                            <div class="form-group col-md-4">
                            <label class="col-form-label">Published Date
                                    </label>
                                    <p>{{date('Y-m-d', $data->published_date)}}</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


