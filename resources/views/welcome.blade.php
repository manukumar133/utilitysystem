<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utility System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-custom {
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        @media (min-width: 768px) {
            .btn-container {
                display: flex;
                justify-content: center;
                gap: 15px;
            }
        }

        @media (max-width: 767px) {
            .btn-custom {
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="container p-4 shadow-lg bg-white rounded text-center" style="max-width: 600px;">
        <h1 class="mb-4">Utility System</h1>
        <div class="btn-container d-flex flex-column flex-md-row">
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-lg btn-custom w-100 w-md-auto">Users</a>
            <a href="{{ route('audio') }}" class="btn btn-secondary btn-lg btn-custom w-100 w-md-auto">Audio</a>
            <a href="{{ route('distance') }}" class="btn btn-success btn-lg btn-custom w-100 w-md-auto">Distance</a>
        </div>
    </div>
</body>

</html>