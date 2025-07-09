<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Savings & Current</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />
    <style>
        /* Re‑use IndBank gradients */
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
            <a class="navbar-brand fw-bold" href="index.html">IndBank</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navBar">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/api/home">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Accounts</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">Savings & Current Accounts</h1>
            <p class="lead">Choose the account that matches your lifestyle and business needs.</p>
            <a href="#compare" class="btn btn-gradient btn-lg mt-3">Compare Accounts</a>
        </div>
    </section>

    <!-- Account Comparison -->
    <section id="compare" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Account Options</h2>
            <div class="row g-4">
                <!-- Savings Account Card -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-transparent border-0 text-center">
                            <h4 class="fw-bold">Savings Account</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item"><i class="fas fa-percentage me-2 text-success"></i>Interest up to 3.5% p.a.</li>
                                <li class="list-group-item"><i class="fas fa-wallet me-2 text-success"></i>Zero balance facility*</li>
                                <li class="list-group-item"><i class="fas fa-mobile-alt me-2 text-success"></i>Mobile & Internet Banking</li>
                                <li class="list-group-item"><i class="fas fa-credit-card me-2 text-success"></i>Free Debit Card with offers</li>
                                <li class="list-group-item"><i class="fas fa-shield-alt me-2 text-success"></i>Insurance cover up to ₹2 Lakh</li>
                            </ul>
                            <div class="d-grid"><a href="#apply" class="btn btn-gradient">Open Savings Account</a></div>
                        </div>
                    </div>
                </div>
                <!-- Current Account Card -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-transparent border-0 text-center">
                            <h4 class="fw-bold">Current Account</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item"><i class="fas fa-exchange-alt me-2 text-primary"></i>Unlimited transactions</li>
                                <li class="list-group-item"><i class="fas fa-rupee-sign me-2 text-primary"></i>Overdraft facility up to ₹5 Lakh**</li>
                                <li class="list-group-item"><i class="fas fa-globe me-2 text-primary"></i>International payments enabled</li>
                                <li class="list-group-item"><i class="fas fa-store me-2 text-primary"></i>Free POS & QR setup</li>
                                <li class="list-group-item"><i class="fas fa-business-time me-2 text-primary"></i>Dedicated relationship manager</li>
                            </ul>
                            <div class="d-grid"><a href="#apply" class="btn btn-gradient">Open Current Account</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-muted mt-3 small">*T&C apply. **Subject to credit assessment.</p>
        </div>
    </section>

    <!-- Apply Section -->
    <section id="apply" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Apply Online in 3 Easy Steps</h2>
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="p-4 border rounded h-100 shadow-sm">
                        <i class="fas fa-file-alt fa-2x mb-3"></i>
                        <h5 class="fw-bold">1. Fill Form</h5>
                        <p class="mb-0">Provide basic details and upload KYC documents.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded h-100 shadow-sm">
                        <i class="fas fa-user-check fa-2x mb-3"></i>
                        <h5 class="fw-bold">2. Verification</h5>
                        <p class="mb-0">Our team verifies your information within 24 hrs.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded h-100 shadow-sm">
                        <i class="fas fa-university fa-2x mb-3"></i>
                        <h5 class="fw-bold">3. Account Ready</h5>
                        <p class="mb-0">Start banking with IndBank instantly.</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="/api/saving_current" class="btn btn-gradient btn-lg">Start Application</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white text-center py-3">
        <div class="container">
            <small>&copy; 2025 IndBank. All rights reserved.</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
