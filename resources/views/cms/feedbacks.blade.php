@extends('layouts.admin')
 @section('title')
 Feedbacks
 @endsection
 @section('content')

 <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Feedbacks
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
<div class="row row-sm mg-t-50">
@foreach($feedbacks as $feedback)
          <div class="col-lg-4">
            <div class="card pd-20 pd-sm-10">
              <div class="card bd-0 wd-xs-200">
                <div class="card-body bd bd-t-0">
                  <h6 class="mg-b-3"><a href="#" class="tx-dark"><strong>Name: </strong>{{$feedback->name}}</a></h6>
                  <p class="mg-b-20 mg-sm-b-30"><strong>Title: </strong> {{ ucwords($feedback->title) }}</p>
                  <p> {!! Str::limit($feedback->body,100) !!}...</p>
                  <div class="col-lg-12">
            <button type="button" onclick="deleteContact({{ $feedback->id }})" class="btn btn-danger pd-x-20" data-dismiss="modal">Delete</button>
            </div>
                </div>
              </div>
            </div><!-- card -->
          </div><!-- col-6 -->
@endforeach
        </div><!-- row -->


    </div>
</div>
</div>
<!-- /.box -->

</div>
<!-- /.col-->
</div>
<!-- ./row -->
</section>


<script>
    function deleteContact(id) {

event.preventDefault();

if (confirm("Are you sure?")) {

    $.ajax({
        url: 'delete/feedbacks/' + id,
        method: 'get',
        success: function(result){
            window.location.assign(window.location.href);
        }
    });

} else {

    console.log('Delete process cancelled');

}

}
</script>
@endsection
