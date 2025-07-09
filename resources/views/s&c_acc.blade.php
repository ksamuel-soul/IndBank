<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Apply - Savings & Current | IndBank</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />
    <style>
        /* Shared gradients from IndBank theme */
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
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">Open Your IndBank Account</h1>
            <p class="lead mb-0">Apply online for a Savings or Current Account in minutes.</p>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Application Form</h2>
            <div class="row g-4">
                <!-- Form Column -->
                <div class="col-lg-7">
                    <form id="acctAppForm" method='POST' novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" id="fullName" class="form-control" placeholder="As per PAN" required />
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" id="dob" class="form-control" required />
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="name@example.com" required />
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Mobile Number</label>
                                <input type="tel" id="mob" class="form-control" placeholder="10‑digit number" required />
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Residential Address</label>
                                <textarea id="add" rows="2" class="form-control" placeholder="Flat / Street / City / PIN" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="pan" class="form-label">PAN</label>
                                <input type="text" id="pan" class="form-control" placeholder="ABCDE1234F" maxlength="10" required />
                            </div>
                            <div class="col-md-6">
                                <label for="aadhaar" class="form-label">Aadhaar No.</label>
                                <input type="text" id="aadhaar" class="form-control" placeholder="12‑digit UIDAI" maxlength="12" required />
                            </div>
                            <div class="col-md-6">
                                <label for="accountType" class="form-label">Account Type</label>
                                <select id="accType" class="form-select" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="Savings">Savings Account</option>
                                    <option value="Current">Current Account</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="deposit" class="form-label">Initial Deposit (₹)</label>
                                <input type="number" id="deposit" class="form-control" placeholder="e.g., 5000" min="0" />
                            </div>
                            <div class="col-12">
                                <label class="form-label d-block mb-2">Optional Services</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="debitCard" value="Debit Card" />
                                    <label class="form-check-label" for="debitCard">Debit Card</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="netBanking" value="Net Banking" />
                                    <label class="form-check-label" for="netBanking">Net Banking</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="smsAlerts" value="SMS Alerts" />
                                    <label class="form-check-label" for="smsAlerts">SMS Alerts</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" required />
                                    <label class="form-check-label" for="terms">I agree to the <a href="#">Terms & Conditions</a>.</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" id='submit' class="btn btn-gradient btn-lg">Submit Application</button>
                        </div>
                    </form>
                </div>
                <!-- Benefits Column -->
                <div class="col-lg-5">
                    <div class="p-4 border rounded shadow-sm h-100 bg-white">
                        <h4 class="fw-bold mb-3">Why Open an Account with Us?</h4>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3"><i class="fas fa-wallet text-success me-2"></i>Zero balance facility for students & seniors</li>
                            <li class="mb-3"><i class="fas fa-rupee-sign text-success me-2"></i>Competitive interest rates on savings</li>
                            <li class="mb-3"><i class="fas fa-exchange-alt text-success me-2"></i>Unlimited free transactions on current account</li>
                            <li class="mb-3"><i class="fas fa-shield-alt text-success me-2"></i>Advanced 2‑factor authentication security</li>
                            <li class="mb-3"><i class="fas fa-headset text-success me-2"></i>24×7 priority customer support</li>
                        </ul>
                    </div>
                </div>
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
    <!-- Simple client‑side validation feedback -->
    <script>
        (function() {
            const form = document.getElementById('acctAppForm');
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        })();
    </script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    const form = document.getElementById('acctAppForm');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const data = {
            Full_Name: document.getElementById('fullName').value,
            DOB: document.getElementById('dob').value,
            Email: document.getElementById('email').value,
            Mobile_No: document.getElementById('mob').value,
            Address: document.getElementById('add').value,
            PAN: document.getElementById('pan').value,
            UIDAI: document.getElementById('aadhaar').value,
            Acc_Type: document.getElementById('accType').value,
            Initial_Amt: document.getElementById('deposit').value,

        };

        fetch(`http://127.0.0.1:8000/api/acc_open_det`, {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            },
            body: JSON.stringify(data)
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                const timed = 10000;
                console.log(data.User_Details);

                Toastify({
                    text: data.Message + "\n" + `Your Account Number:- ${data.User_Details.Account_No} <sup><i class="fa-solid fa-copy" style='font-size: 15px;'  onclick='navigator.clipboard.writeText("${data.User_Details.Account_No}");'></sup></i>`,
                    duration: timed,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4caf50",
                    close: false,
                    escapeMarkup: false 
                }).showToast();
                setTimeout(() => {
                    window.location.href = "/api/saving_current";
                }, timed);
            } else {
                Toastify({
                    text: data.Message,
                    duration: 10000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "red",
                    color: white,
                    close: true
                }).showToast();
            }
        });
    });
</script>