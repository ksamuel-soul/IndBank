<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
     <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IndBank Home</title>
    <!-- Bootstrap 5.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero gradient */
        .hero {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            /* peach shades */
        }

        /* Navbar gradient */
        .navbar-gradient {
            background: linear-gradient(135deg, #ff6a00, #ee0979);
        }

        footer {
            background: linear-gradient(135deg, #ff6a00, #ee0979);
        }

        /* Gradient Buttons */
        .btn-gradient {
            background: linear-gradient(to right, #43cea2, #185a9d);
            border: none;
            color: white;
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBar"
                aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navBar">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#loans">Loans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">Welcome to IndBank</h1>
            <p class="lead">Your trusted partner for every banking need.</p>
            <a href="#loans" class="btn btn-gradient btn-lg mt-3">View Loans</a><span style="padding: 20px;"> </span>
            <a href="#services" class="btn btn-gradient btn-lg mt-3">View Services</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Bank Features</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">24x7 Support</h5>
                            <p class="card-text">Round-the-clock assistance for seamless banking.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Secure Access</h5>
                            <p class="card-text">Robust security protocols safeguard your data.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Quick Loans</h5>
                            <p class="card-text">Fast approval process for personal and business loans.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Loans Section -->
    <section id="loans" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Available Loans</h2>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Home Loan</h5>
                            <p class="card-text">Competitive rates to help you own your dream home.</p>
                            <center><a href="#contact" class="btn btn-gradient">Apply Now</a></center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Car Loan</h5>
                            <p class="card-text">Flexible repayment options for your new ride.</p>
                            <center><a href="#contact" class="btn btn-gradient">Apply Now</a></center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Edu Loan</h5>
                            <p class="card-text">Support with low-interest education loans.</p>

                            <center><a href="#contact" class="btn btn-gradient">Apply Now</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Services</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><a href="/api/acc" class="text-decoration-none">Savings & Current
                                    Accounts</a></h5>
                            <p class="card-text">Open savings or current accounts with personalized banking solutions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Fixed & Recurring Deposits</h5>
                            <p class="card-text">Grow your money safely with flexible tenures and attractive interest
                                rates.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><a href="/api/imb" class="text-decoration-none">Internet & Mobile
                                    Banking</a></h5>
                            <p class="card-text">Experience seamless banking from anywhere, anytime with our digital
                                platforms.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Credit & Debit Card Services</h5>
                            <p class="card-text">Enjoy convenience, offers, and rewards with our card products.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Loan Products</h5>
                            <p class="card-text">Personal, Home, Car, and Education Loans tailored to your needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Investments & Insurance</h5>
                            <p class="card-text">Secure your future with our wealth-building and protection plans.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">ATM & Cash Deposit Machines</h5>
                            <p class="card-text">Easy access to banking facilities across multiple locations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-0">Contact</h2>
            <p class="text-center mb-4">**Only related Loans**</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form id="contact" method="POST">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="name" placeholder="First Name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email"
                                placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone No</label>
                            <input type="tel" class="form-control" id="phone" placeholder="123-456-7890">
                        </div>
                        <div class="mb-3">
                            <label for="loanType" class="form-label">Loan Type</label>
                            <select id="loanType" class="form-select">
                                <option value="">Select Option</option>
                                <option value="Home_Loan">Home Loan</option>
                                <option value="Car_Loan">Car Loan</option>
                                <option value="Personal_Loan">Personal Loan</option>
                                <option value="Educational_Loan">Educational Loan</option>
                            </select>
                        </div>
                        <center>
                            <span id="msg"> </span>
                            <button type="submit" class="btn btn-gradient" id="submit">Send</button>
                        </center>
                    </form>
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

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


<script>
    const form = document.getElementById('contact');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const data = {
            First_Name: document.getElementById('name').value,
            Last_Name: document.getElementById('lname').value,
            Email: document.getElementById('email').value,
            Phone_No: document.getElementById('phone').value,
            Loan_Type: document.getElementById('loanType').value
        };
        fetch(`http://127.0.0.1:8000/api/enq_det_reg`, {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            },
            body: JSON.stringify(data)
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                document.getElementById('msg').innerHTML = `<h3>Your Enquiry-Form has been submitted with the Application No.<u>${data.User_Details.Enq_No} <sup><i class="fa-solid fa-copy" style='font-size: 15px;'  onclick='navigator.clipboard.writeText("${data.User_Details.Enq_No}"); alert("Copied the text: " + "${data.User_Details.Enq_No}");'></sup></i></u></h3>
                <br>`;
            } else if (data.Status == 404) {
                console.error(data.Message);
            }
        });
    });
</script>
