<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Pusher Test</title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="{{asset('js/app.js')}}"></script>
      <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
      <script>
    
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('6ac2d73facafe8f89c01', {
          cluster: 'ap1'
        });
    
        var channel = pusher.subscribe('my-channel');
        channel.bind('pusherevent', function(data) {
          alert(JSON.stringify(data));
        });
      </script>
    </head>
    <body>
      <h1>Pusher Test</h1>
      <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
      </p>
    </body>
</html>