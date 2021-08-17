   
@extends('frontend.master')
@section('title','Audio Mixtapes')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <H2 class="text-center">Mixtapes</H2>
      @if (!empty($mixxes))
      <table class="table table-bordered table-responsive" id="frontdatatable">
          <thead>
            <tr>
              <th scope="col" style="border: 2px solid black; width: 17%;">Name</th>
              <th scope="col" style="border: 2px solid black; width: 20%;">Image</th>
              <th scope="col" style="border: 2px solid black; width: 37%;">Stream</th>
              <th scope="col" style="border: 2px solid black; width: 11%;">Size</th>
              <th scope="col" style="border: 2px solid black; width: 15%;">Download</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($mixxes as $mix)
              
              <tr>
                  <td>{{ $mix->mix_name }}</td>
                  <td><img src="{{ asset ('miximages/'.$mix->mix_image) }}" style="width:120px; border:2px solid black;height:80px;"></td>
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
      </table>
    </div>
    
    {{-- <div class="d-flex justify-content-center" style="background: blue">
      {!! $mixxes->links() !!}
    </div> --}}
  @endif
</div>
</div>

@endsection