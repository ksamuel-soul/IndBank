<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Internet Banking | IndBank</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />
    <style>
        .navbar-gradient {
            background: linear-gradient(135deg, #ff6a00, #ee0979);
        }
        .hero {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
        }
        footer {
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-gradient">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">IndBank</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Internet Banking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">IndBank Internet Banking</h1>
            <p class="lead">Access your account anytime, anywhere — secure and convenient banking at your fingertips.</p>
            <a href="#login" class="btn btn-gradient btn-lg mt-3">Login Now</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">What You Can Do</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-money-check-alt fa-2x mb-3 text-primary"></i>
                        <h5 class="fw-bold">Fund Transfers</h5>
                        <p>Send money instantly through NEFT, RTGS, and IMPS with ease and security.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-bolt fa-2x mb-3 text-warning"></i>
                        <h5 class="fw-bold">Bill Payments</h5>
                        <p>Pay utility bills, recharge mobile/DTH, and manage your standing instructions online.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-piggy-bank fa-2x mb-3 text-success"></i>
                        <h5 class="fw-bold">Balance & Statements</h5>
                        <p>Check your account balance, view transaction history, and download e-statements.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-user-shield fa-2x mb-3 text-danger"></i>
                        <h5 class="fw-bold">Strong Security</h5>
                        <p>2-factor authentication and OTP validation for a secure banking experience.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-credit-card fa-2x mb-3 text-info"></i>
                        <h5 class="fw-bold">Card Management</h5>
                        <p>Enable, disable or block cards instantly and set transaction limits.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-file-invoice-dollar text-primary fa-2x mb-3"></i>
                        <h5 class="fw-bold">Loan Application</h5>
                        <p>Personal, Home, Car, and Education Loans tailored to your needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Prompt -->
    <section id="login" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Already Registered?</h2>
            <p class="mb-3">Click below to login to your Internet Banking account.</p>
            <a href="/api/cus_login" class="btn btn-gradient btn-lg">Login to Internet Banking</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white text-center py-3">
        <div class="container">
            <small>&copy; 2025 IndBank. Internet Banking Services.</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
