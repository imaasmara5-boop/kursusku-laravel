
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KursusKu')</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f3ff;
            color: #292044;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 245px;
            background: #352064;
            color: white;
            padding: 28px 20px;
        }

        .sidebar h2 {
            margin-bottom: 35px;
            font-size: 24px;
        }

        .sidebar a {
            display: block;
            color: #e9ddff;
            text-decoration: none;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 9px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #6941c6;
            color: white;
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .topbar h1 {
            font-size: 25px;
        }

        .content-card,
        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 3px 15px rgba(45, 25, 90, 0.06);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card p {
            color: #77718a;
            margin-bottom: 10px;
        }

        .stat-card h2 {
            font-size: 27px;
            color: #542c9c;
        }

        .content-card {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 15px 12px;
            border-bottom: 1px solid #eeeaf5;
        }

        th {
            color: #77718a;
            font-size: 12px;
        }

        .btn-edit {
            display: inline-block;
            background: #6941c6;
            color: white;
            text-decoration: none;
            padding: 9px 14px;
            border-radius: 7px;
        }

        .btn-edit:hover {
            background: #4f2b9b;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 11px;
            border: 1px solid #d9d2e8;
            border-radius: 8px;
            font: inherit;
        }

        .btn-primary {
            display: inline-block;
            border: none;
            background: #6941c6;
            color: white;
            padding: 11px 20px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }

        .alert {
            padding: 13px;
            margin-bottom: 18px;
            border-radius: 8px;
            background: #e8f8ed;
            color: #216b38;
        }

        @media (max-width: 768px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .main {
                padding: 18px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="layout">
    <aside class="sidebar">
        <h2>KursusKu</h2>

        <a href="{{ url('/') }}">Dashboard</a>
        <a href="{{ route('courses.index') }}">Data Kursus</a>
        <a href="{{ url('/enrollments') }}">Pendaftaran</a>
    </aside>

    <main class="main">
        <div class="topbar">
            <h1>@yield('page-heading', 'Dashboard KursusKu')</h1>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</div>

</body>
</html>
