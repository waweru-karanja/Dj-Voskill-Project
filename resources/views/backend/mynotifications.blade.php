@extends('backend.adminmaster')
@section('title','My Notifications')
@section('content')
    <div class="content-wrapper">
        my notifiations
        <ul>
            @foreach ($notifications as $notification )
            <li>
                @if ($notification->type='App\Notifications\Newbookingreceived')

                A New Booking has been received
                <strong> {{ $notification->data['bookingstatus']['full_name']}}</strong>

                <a href="{{ route('requestdeposit',$notification->data['bookingstatus']['id']) }}"> View The Booking</a>
                    
                @endif
            </li> 
            @endforeach
        </ul>
    </div>
@endsection