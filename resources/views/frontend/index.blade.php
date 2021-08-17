
@extends('frontend.master')
@section('title','VOSKILL')
@section('content')

<div class="container" style="border:2px solid black; background:rgb(255, 249, 249);">
    

    <!----Events Start---->
    <div class="ms_genres_wrapper" style=" margin-bottom:20px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="ms_heading">
                    <h3>Upcoming Events</h3>
                    <span class="veiw_all"><a href="{{route ('events') }}">View All</a></span>
                </div>
            </div>
            @foreach ($events as $event )
            <div class="col-lg-3 col-md-6">
                <div class="swiper-slide">
                    <div class="event-feed latest" style="border: 1px solid;
                    padding: 5px;
                    box-shadow: 5px 5px 5px 5px #888888;">
                        <img src="{{asset('eventimages/'.$event->eve_image) }}"  alt="" style="width:100%; height:200px;">
                        
                        <h5><a href="{{ route('events') }}" >{{ $event->eve_name }}</a></h5>
                        <ul style="list-style-type: none;">
                            <li><i class=" fa fa-location-arrow"></i>{{ $event->eve_location }}</li>
                            <li><i class="fas fa-clock"></i></b>{{ $event->eve_time }}</li>
                            
                        </ul>
                        <button type="button" class="btn-default">
                            <a href="#">Buy tickets</a>
                        </button>
                        <button type="button" class="btn-success" style="hover{background:blue;}">
                            <a href="{{ url('event/'.Str::slug($event->eve_name).'/'.$event->id) }}">More Details</a>
                        </button>
                    </div><!--\\event-feed latest-->
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
    
    <!----Events Start---->
    <div class="ms_genres_wrapper" style=" margin-bottom:20px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="ms_heading">
                    <h3>Blog Posts</h3>
                    <span class="veiw_all"><a href="{{route ('blog') }}">View All</a></span>
                </div>
            </div>
            @foreach ($blog as $bl )
            <div class="col-lg-3 col-md-6">
                <div class="swiper-slide">
                    <div class="ms_rcnt_box">
                        <div class="ms_rcnt_box_img">
                            <img src="{{ asset('blogposts/'.$bl->blo_image) }}" alt="{{ $bl->blo_title }}" style="width:100%; height:200px;">
                            
                        </div>
                        <div class="ms_rcnt_box_text">
                            <h3><a href="{{ url('blog/post/'.Str::slug($bl->blo_title).'/'.$bl->id) }}">{{ $bl->blo_title }} </a></h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>

    <!----Mixtapes Start---->
    <div class="ms_genres_wrapper" style=" margin-bottom:20px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="ms_heading">
                    <h3>Mixtapes</h3>
                    <span class="veiw_all"><a href="{{route ('audiomixtapes') }}">View All</a></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                
                @if (!empty($mixxes))
                    <table class="table table-bordered dt-responsive nowrap  order-column table-responsive" style="width:100%;" id="frontdatatable">
                        <thead class="thead-dark">
                            <tr>
                            <th style="border: 2px solid black; width: 17%;">Name</th>
                            <th style="border: 2px solid black; width: 20%;">Image</th>
                            <th style="border: 2px solid black; width: 37%;">Stream</th>
                            <th style="border: 2px solid black; width: 11%;">Size</th>
                            <th style="border: 2px solid black; width: 15%;">Download</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @forelse ($mixxes as $mix)
                            
                            <tr>
                                <td>{{ $mix->mix_name }}</td>
                                <td><img src="{{ asset ('miximages/'.$mix->mix_image) }}" style="width:100%; border:2px solid black;height:100px;"></td>
                                <td>
                                <div class="players" style="border: 2px solid black; margin:0;">
                                    <audio id="player2" preload="none" controls >
                                        <source src="{{ asset ('mixtapes/'.$mix->mix_audio) }}" type="audio/mp3">                
                                    </audio>
                                </div>
                                </td>
                                <td>{{$mix->mix_size}}Mb</td>
                                <td><a href="/home/download/{{$mix->mix_audio}}">Download</a></td>
                                
                            </tr>
                            @empty
                            <strong style="font-size: 20px;">No Available Mixxes</strong>
                            @endforelse
                        </tbody>
                    </table>
                @endif
                {{-- @if (!empty($mixxes))
                <table class="table table-bordered dt-responsive nowrap  order-column" id="frontdatatables" style="border:2px solid red;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Mixtape Name</th>
                            <th scope="col">Mixtape Length</th>
                            <th scope="col">Mixtape Size</th>
                            <th scope="col">Mixtape Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mixxes as $mix)
                        <tr>
                            <td>{{$mix->id}}</td>
                            <td>{{$mix->mix_name}}</td>
                            <td>{{$mix->mix_length}}mins</td>
                            <td>{{$mix->mix_size}}MB</td>
                            <td><img src="{{ asset ('miximages/'.$mix->mix_image) }}" style="width:120px; border:2px solid black;height:80px;"></td>
                            <td>
                                <form action="{{route('mixxes.destroy',$mix->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <a class="btn btn-success" href="{{ route('mixxes.edit',$mix->id)}}"> Edit </a>
                                    <input type="submit" class="btn btn-warning" value="DELETE">
                                </form>
                            </td>
                        </tr>
                        @empty
                        <strong style="font-size: 20px;">No Available Mixxes</strong>
                        @endforelse
                    </tbody>
                </table>
                @endif --}}

                {{-- <table class="table table-bordered dt-responsive" style="width:100%;">
                    {{-- <thead>
                        <tr>
                          <th style="border: 2px solid black; width: 17%;">Name</th>
                          <th style="border: 2px solid black; width: 20%;">Image</th>
                          <th style="border: 2px solid black; width: 37%;">Stream</th>
                          <th style="border: 2px solid black; width: 11%;">Size</th>
                          <th style="border: 2px solid black; width: 15%;">Download</th>
                        </tr>
                      </thead> 
                      <tbody>
                          @forelse ($mixxes as $mix)
                          
                          <tr>
                              <td>{{ $mix->mix_name }}</td>
                              <td><img src="{{ asset ('miximages/'.$mix->mix_image) }}" style="width:100%; border:2px solid black;height:100%;"></td>
                              <td>
                                <div class="players" style="border: 2px solid black; margin:0;">
                                  <audio id="player2" preload="none" controls style="width: 100%;">
                                      <source src="{{ asset ('mixtapes/'.$mix->mix_audio) }}" type="audio/mp3">                
                                  </audio>
                                </div>
                              </td>
                              <td>{{$mix->mix_size}}Mb</td>
                              <td><a href="/home/download/{{$mix->mix_audio}}">Download</a></td>
                              
                          </tr>
                          @empty
                          <strong style="font-size: 20px;">No Available Mixxes</strong>
                          @endforelse
                      </tbody>
                </table> --}}
            </div>
            
        </div>
    </div>
</div>

@endsection