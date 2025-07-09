<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IndBank Emp Login</title>
    <!-- Bootstrap 5.0 CSS -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Shared gradients from homepage */
        .navbar-gradient {
            background: linear-gradient(135deg, #ff6a00, #ee0979);
        }
        .btn-gradient {
            background: linear-gradient(to right, #43cea2, #185a9d);
            border: none;
            color: #fff;
        }
        .btn-gradient:hover {
            background: linear-gradient(to right, #11998e, #38ef7d);
        }
        /* Full‑page gradient backdrop */
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #ff7e5f 0%, #feb47b 100%);
        }
        .login-card {
            max-width: 400px;
            width: 100%;
        }
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-gradient">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">IndBank</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navBar">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <main>
        <div class="card shadow login-card">
            <div class="card-body p-4">
                <h5 class="card-title text-center mb-4 fw-bold">Employee Login</h5>
                <form id="login" method="POST">
                    <div class="mb-3">
                        <label for="empEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="empEmail" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="empPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="empPass" placeholder="Password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" id="submit" class="btn btn-gradient">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
    const form = document.getElementById('login');
    form.addEventListener('submit', function(e){
        e.preventDefault();
        const data = {
            Email:document.getElementById('empEmail').value,
            Password:document.getElementById('empPass').value
        };
        fetch(`http://127.0.0.1:8000/api/emp_login`, {
            method:"POST",
            headers:{"Content-type":"application/json"},
            body:JSON.stringify(data)
        }).then(res=>res.json()).then(data=>{
            if(data.Status == 200)
            {
                sessionStorage.setItem("Emp_Token", data.Token);
                sessionStorage.setItem("Emp_Name", data.User_Details.First_Name);
                window.location.href = "/api/emp_home"; 
            }
            else if(data.Status == 4044)
            {
                alert(data.Message);
            }
            else if(data.Status == 404)
            {
                alert(data.Message);
            }
        });
    });
</script>