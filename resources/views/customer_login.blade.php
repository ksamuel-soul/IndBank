<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Customer Login | IndBank</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .navbar-gradient {
            background: linear-gradient(135deg, #ff6a00, #ee0979);
        }

        .hero {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            flex: 1 0 auto;
        }

        footer {
            background: linear-gradient(135deg, #ff6a00, #ee0979);
            flex-shrink: 0;
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-gradient" href="/">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="hero text-white py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 order-2 order-md-1">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h3 class="text-center mb-4 text-dark">Customer Login</h3>
                            <form method="POST" id="login_form">
                                <!-- email -->
                                <div class="mb-0">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your Email" required />
                                </div>

                                <!-- password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="pass" name="password"
                                        placeholder="Enter your Password" required />
                                </div>
                                <!-- OTP input + two buttons in one row -->
                                <div class="row g-2 mb-3 align-items-center">
                                    <span id="otp"> </span>
                                    <div class="d-grid mb-3">
                                        <button type="submit" id="submit" class="btn btn-gradient">Login</button>
                                    </div>
                                </div>
                            </form>

                            <p class="mt-3 text-center">
                                <a href="/api/forgot_pass">Forgot Password?</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Bank Info Column -->
                <div class="col-md-5 mb-4 mb-md-0 order-1 order-md-2">
                    <h2 class="fw-bold">Welcome to IndBank</h2>
                    <p>Serving over <strong>25 million</strong> customers across India, IndBank is your trusted partner
                        for convenient and secure digital banking.</p>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-shield-alt text-light me-2"></i>Advanced 2‑factor
                            authentication keeps your account safe.</li>
                        <li class="mb-3"><i class="fas fa-mobile-alt text-light me-2"></i>Bank on‑the‑go with our
                            top‑rated mobile app.</li>
                        <li class="mb-3"><i class="fas fa-headset text-light me-2"></i>24×7 customer support with
                            <em>Instant Chat Assist</em>.
                        </li>
                        <li class="mb-3"><i class="fas fa-percent text-light me-2"></i>Earn up to <strong>3.5%
                                p.a.</strong> on your savings balance.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- About & Services Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Why Bank with Us?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-rupee-sign fa-2x mb-3 text-success"></i>
                        <h5 class="fw-bold">Transparent Charges</h5>
                        <p>No hidden fees — clear, upfront pricing on every service.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-bolt fa-2x mb-3 text-warning"></i>
                        <h5 class="fw-bold">Instant Transfers</h5>
                        <p>Send money in real‑time 24×7 via IMPS or UPI.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-award fa-2x mb-3 text-primary"></i>
                        <h5 class="fw-bold">Award‑Winning Service</h5>
                        <p>Rated India’s Best Digital Bank 2024 by <em>Finance Today</em>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white text-center py-3 mt-auto">
        <div class="container">
            <small>&copy; 2025 IndBank. Customer Portal.</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script>
    const form = document.getElementById('login_form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const data = {
            Email: document.getElementById('email').value,
            Password: document.getElementById('pass').value
        };

        fetch(`http://127.0.0.1:8000/api/cus_login`, {
            method: "POST",
            headers: {
                "Content-type": "appliation/json"
            },
            body: JSON.stringify(data)
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                document.getElementById('submit').hidden = true;
                document.getElementById('email').disabled = true;
                document.getElementById('pass').disabled = true;
                sessionStorage.setItem('token', data.Token);
                sessionStorage.setItem('name', data.User_Details.Full_Name);
                sessionStorage.setItem('email', data.User_Details.Email);
                sessionStorage.setItem('acc_no', data.User_Details.Account_No);
                document.getElementById('otp').innerHTML = `
                <form id="otp_formers" method="POST">
                    <div class="row g-2 mb-3 align-items-center">
                        <div class="col">
                            <input type="text" class="form-control" id="otps" name="otp"
                                placeholder="Enter OTP" />
                        </div>
                        <div class="col-auto">
                            <button type="button" id="sendOtp" onclick="return sendOtpp()"
                                class="btn btn-gradient">
                                Send OTP
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="button" id="submit" onclick="return verifyOtpp()" class="btn btn-gradient">
                                Verify OTP
                            </button>
                        </div>
                    </div>
                </form>`;
            } else if (data.Status == 404) {
                Toastify({
                    text: data.Message,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "hotpink",
                    close: false
                }).showToast();
                setTimeout(() => {
                    window.location.href = '/api/cus_login';
                }, 3000);
            }
        });
    });
</script>

<script>
    function sendOtpp() {
        const ede = document.getElementById('email').value;
        fetch(`http://127.0.0.1:8000/api/send_otp_login/${ede}`, {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            }
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                Toastify({
                    text: data.Message,
                    duration: 3000,
                    gravity: 'top',
                    position: "right",
                    close: false,
                    backgroundColor: "green"
                }).showToast();
            } else if(data.Status == 404) {
                alert(data.Message);
            }
            else{
                alert("Some thing went wrong..!!!");
            }
        });
    }

    function verifyOtpp() {
        fetch(`http://127.0.0.1:8000/api/chk_otp_login`, {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            },
            body: JSON.stringify({
                "Enter_OTP": document.getElementById('otps').value
            })
        }).then(res => res.json()).then(data => {
            console.log(data);
            if (data.Status == 200) {
                window.location.href = "/api/cus_home";
            } else if (data.Status == 404) {
                Toastify({
                    text: data.Message,
                    duration: 3000,
                    gravity: "top",
                    position: 'right',
                    backgroundColor: "red",
                    close: false
                }).showToast();
            }
        });
    }
</script>