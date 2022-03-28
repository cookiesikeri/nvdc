@extends('layouts.admin')
 @section('title')
Gallery
 @endsection
 @section('content')


 <section class="content">

    <!-- START ALERTS AND CALLOUTS -->

    <button type="submit" class="btn btn-primary mg-r-5" data-toggle="modal" data-target="#modaldemo1"><i class="menu-item-icon icon ion-ios-plus-outline tx-20"></i> Add Photo</button>
    <button type="submit" class="btn btn-primary mg-r-5" data-toggle="modal" data-target="#modaldemo2"><i class="menu-item-icon icon ion-ios-plus-outline tx-20"></i> Add Category</button>
    <button type="submit" class="btn btn-primary mg-r-5" data-toggle="modal" data-target="#modaldemo3"><i class="menu-item-icon icon ion-ios-plus-outline tx-20"></i> View Category</button>
    <div class="row">
        @foreach($galleries as $key=>$service)
      <div class="col-md-6">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">{{++$key}}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <img src="{{URL::to($service->image)}}" alt="" height="300" width="500">
            <div class="alert alert alert-dismissible">
                <strong>Title:</strong> {{$service->title}}</a><br>
                <strong>Category:</strong> {{$service->category}}</a><br>
                <br>
              <div class="col-lg-12">
                  <button type="button" onclick="deleteContact({{ $service->id }})" class="btn btn-danger pd-x-20" data-dismiss="modal">Delete</button>
                  </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      @endforeach
      @include('modals.addimage')
      @include('modals.addcategory')
      @include('modals.viewcategory')

    </div>


    <!-- END PROGRESS BARS -->

    <!-- END TYPOGRAPHY -->

  </section>

    <script>
        function deleteContact(id) {

    event.preventDefault();

    if (confirm("Are you sure?")) {

        $.ajax({
            url: 'delete/abigallery/' + id,
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

<script>


    function deleteCategory(id) {

        event.preventDefault();

        if (confirm("Are you sure?")) {

            $.ajax({
                url: 'delete/categories/' + id,
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
