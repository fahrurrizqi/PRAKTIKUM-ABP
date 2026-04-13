<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow text-center" style="width: 350px;">
        <h3>Home</h3>
        <p class="mt-3">Selamat datang, <b>{{ Auth::user()->name }}</b></p>

        <a href="/logout" class="btn btn-danger mt-3">Logout</a>
    </div>
</div>

</body>
</html>