<div class="notification_bar">
    @if(isset($_SESSION['notify']))
        @foreach ($_SESSION['notify'] as $key => $notification)
            @php
                $notification = json_decode($notification,true);
                $message = $notification[0];
                $params = $notification[1];
                $model_id = $key;
            @endphp
            <div class="notification_data" model_id="" param="{{ json_encode($params,true) }}">
                <div class="actions"></div>
                <div class="message">{{ $message }}</div>
                <div class="buttons"></div>
            </div>
        @endforeach
    @endif
</div>