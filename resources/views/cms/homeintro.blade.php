@extends('layouts.admin')
@section('title')
Home Intro
@endsection

@section('content')


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Home Intro
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                      title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
            <form id="aboutForm" action="{{ route('cms.update', ['page' => 'homeintro', 'id' => 1]) }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <textarea id="summernote" name="home_intro" class="form-control">{!! $general->home_intro !!}</textarea>
                <div class="form-group">
                    <label for="image">Intro image</label>
                    <input type="file" name="introimage" class="form-control">
                </div>
                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-primary mg-r-5">Update</button>
                </div>
            </form>
          </div>
          <br>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <form id="aboutForm" action="{{route('cms.homesub.update')}}" method="POST" enctype="multipart/form-data">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="PUT">
                                <textarea  name="column1" value="{{$general->column1}}" class="form-control">{!! $general->column1 !!}</textarea>
                                <br>
                                <textarea  name="column2" value="{{$general->column2}}" class="form-control">{!! $general->column2 !!}</textarea>
                                <br>
                                <textarea  name="column3" value="{{$general->column3}}" class="form-control">{!! $general->column3 !!}</textarea>
                                <br>
                                <textarea  name="column4" value="{{$general->column4}}" class="form-control">{!! $general->column4 !!}</textarea>
                                <br>

                                <div class="form-layout-footer">
                                  <button type="submit" class="btn btn-primary mg-r-5">Update</button>
                              </div>

                              </form>
                              </div><!-- card -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>

@endsection
