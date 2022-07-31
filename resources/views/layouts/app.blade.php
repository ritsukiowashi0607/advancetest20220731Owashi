<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<title>@yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show

<div>
    @yield('content')
</div>
</body>
</html>
