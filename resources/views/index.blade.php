<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SimpleChat</title>
</head>
<body>
<div class="container" id="container">
    <div id="app">
        <simple-chat />
    </div>
</div>
<script>
    window.ECHO_HOST = "{{ '//' . Request::getHost() . ':6001' }}"
</script>
<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>