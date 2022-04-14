@extends('layouts.admin')
@section('title')
    Home
@endsection
@section('content')

<section class="content">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-handshake-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Volunteers</span>
            <span class="info-box-number">{{$careers}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$careers}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-feed"></i></span>

          <div class="info-box-content">
            <span class="info-box-text" title="Programs">Programs</span>
            <span class="info-box-number">{{$posts}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$posts}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-rocket"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Projects</span>
            <span class="info-box-number">{{ \App\Models\Project::all()->count() }}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{ \App\Models\Project::all()->count() }}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->




      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-envelope-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Messages</span>
            <span class="info-box-number">{{$messages}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$messages}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Feedbacks</span>
            <span class="info-box-number">{{$feedbackscount}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$feedbackscount}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-cubes"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Donations</span>
            <span class="info-box-number">{{$services}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$services}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Clients</span>
            <span class="info-box-number">{{$clients}}</span>

            <div class="progress">
              <div class="progress-bar progress-bar-blue" style="width: {{$clients}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
        <div class="box col-md-6">
            <div class="box-header">
              <i class="fa fa-comments"></i>

              <h3 class="box-title">Feedbacks from Guests</h3>

              <div class="box-tools pull-right" data-toggle="tooltip" title="refresh">
                <div class="btn-group" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-sm no-border red-btn"><a href=""> <i class="fa fa-refresh text-white"></i></a></button>
                </div>
              </div>
            </div>
            <div class="box-body chat" id="chat-box">
              <!-- chat item -->
              @if(count($feedbacks) < 1 )
              <div class="col-md-12">
                  <h3>No Feedback Available.</h3>
              </div>
              @endif
              @foreach($feedbacks as $item)
              <div class="item">
                <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-user"></i></span>
                {{-- <img src="{{asset('img/download.png')}}" alt="user image" class="offline"> --}}

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-calendar"></i> {{ date('M j, Y', strtotime($item->created_at)) }}</small>
                    {{$item->name}}
                  </a>
                  {!! $item->body !!}
                </p>
              </div>
              <!-- /.item -->
              @endforeach
            </div>
            <!-- /.chat -->
          </div>

    </div>

        <!-- Calendar -->
        <div class="box box-solid bg-blue-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>

            <h3 class="box-title">Calendar</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <!-- button with a dropdown -->
              <div class="btn-group">
                <button type="button" class="btn btn-blue btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Add new event</a></li>
                  <li><a href="#">Clear events</a></li>
                  <li class="divider"></li>
                  <li><a href="#">View calendar</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-black">
            <div class="row">
              <div class="col-sm-6">
                <!-- Progress bars -->

              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.box -->


    <!-- /.row (main row) -->

  </section>


@endsection


