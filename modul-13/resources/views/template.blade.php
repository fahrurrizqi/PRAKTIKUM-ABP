<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>@yield('title') - E-Commerce</title> 
    <!-- Outfit Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
        }
        .navbar-custom {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 20px;
            border-radius: 12px;
            margin-top: 15px;
            margin-bottom: 30px;
        }
        .card-custom {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            color: #f8fafc;
            padding: 25px;
        }
        .table {
            color: #f8fafc;
            border-color: rgba(255, 255, 255, 0.1);
        }
        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.02);
            color: #f8fafc;
        }
        .table-striped>tbody>tr:nth-of-type(even) {
            background-color: rgba(255, 255, 255, 0.05);
            color: #f8fafc;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .btn-warning-custom {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: none;
            color: #0f172a;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-warning-custom:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            box-shadow: 0 0 10px rgba(245, 158, 11, 0.4);
            color: #0f172a;
        }
    </style>
</head> 
<body class="container"> 
    @auth 
    <div class="navbar-custom d-flex justify-content-between align-items-center">
        <h4 class="mb-0 text-primary fw-bold" style="background: linear-gradient(to right, #3b82f6, #60a5fa); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">E-Commerce Admin</h4>
        <div class="d-flex align-items-center gap-3"> 
            <span class="text-secondary">Logged in as: <strong class="text-white">{{ Auth::user()->name }}</strong></span> 
            <a href="/logout" class="btn btn-warning-custom btn-sm">Logout</a> 
        </div> 
    </div> 
    @endauth 
    
    <div class="row justify-content-center"> 
        @yield('content') 
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body> 
</html>
