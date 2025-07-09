<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Employee Dashboard | IndBank</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
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

        th,
        td {
            text-align: center;
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
                    <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" onclick="return logout()"
                            style="cursor: pointer;">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">Welcome <span id="nam"></span></h1>
            <p class="lead">Manage and approve new account applications efficiently.</p>
        </div>
    </section>

    <script>
        document.getElementById("nam").innerText = sessionStorage.getItem("Emp_Name") || "";
    </script>

    <!-- Pending Accounts: Side-by-Side -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <!-- Saving & Current -->
                <div class="col-md-6">
                    <div class="p-4 border rounded text-center shadow-sm bg-white h-100">
                        <h4 class="fw-bold mb-3">Saving & Current Pending Account(s)</h4>
                        <label for="chk_acc_no" class="form-label">Check Account</label>
                        <input type="text" id="chk_acc_no" class="form-control mb-3" placeholder="Check Account"
                            required />
                        <button type="button" id="submit" onclick="return show_tbl()"
                            class="btn btn-gradient btn-lg w-100">Check</button>
                        <hr />
                        <span id="table"></span>


                        <!-- Customer Registration -->
                        <hr class="my-4" />
                        <h4 class="fw-bold mb-3">Customer Registration</h4>
                        <label for="reg_acc_no" class="form-label">Account Number</label>
                        <input type="text" id="reg_acc_no" class="form-control mb-3"
                            placeholder="Enter Account Number" required />
                        <button type="button" id="submit" onclick="return regCus()"
                            class="btn btn-gradient btn-lg w-100">Register</button>
                        <span id="reg_result" class="d-block mt-3"> </span>
                    </div>
                </div>

                <!-- Loan -->
                <div class="col-md-6">
                    <div class="p-4 border rounded text-center shadow-sm bg-white h-100">
                        <h4 class="fw-bold mb-3">Loan Pending Account(s)</h4>
                        <label for="chk_ln_acc_no" class="form-label">Check Loan Account</label>
                        <input type="text" id="chk_ln_acc_no" class="form-control mb-3" placeholder="Check Account"
                            required />
                        <button type="button" id="submit" onclick="return show_loan_acc()"
                            class="btn btn-gradient btn-lg w-100">Check</button>
                        <hr />
                        <span id="table_loan"></span>

                        <!-- Customer Loan Amount Debit -->
                        <hr class="my-4" />
                        <h4 class="fw-bold mb-3">Customer Loan Amount Debit</h4>
                        <label for="reg_acc_no" class="form-label">Enter the Below Details</label>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <form method="POST" id="ln_debit_app">
                                    <input type="text" id="app_no" class="form-control mb-3"
                                        placeholder="Enter Application Number" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" id="months" class="form-control mb-3"
                                    placeholder="Enter Month(in numbers)" required />
                            </div>
                            <button type="button" id="submit" onclick="return ln_deb_amt()"
                                class="btn btn-gradient btn-lg w-100">Debit Amount</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Services -->
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Employee Services</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-check-circle fa-2x mb-3 text-success"></i>
                        <h5 class="fw-bold">Approve Applications</h5>
                        <p>Review submitted documents and verify KYC to approve new accounts.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-user-edit fa-2x mb-3 text-primary"></i>
                        <h5 class="fw-bold">Update Customer Details</h5>
                        <p>Edit account information including contact and address details on request.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded text-center shadow-sm h-100">
                        <i class="fas fa-lock fa-2x mb-3 text-danger"></i>
                        <h5 class="fw-bold">Block / Unblock Accounts</h5>
                        <p>Temporarily restrict or reinstate access based on account activity or request.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white text-center py-3">
        <div class="container">
            <small>&copy; 2025 IndBank. Internal Employee Portal.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>



<script>
    const token = sessionStorage.getItem("Emp_Token");
    if (!token) {
        alert("Login_First");
        window.location.href = "/api/emp_login";
    }
</script>

<script>
    const tokenn = sessionStorage.getItem("Emp_Token");

    function logout() {
        fetch(`http://127.0.0.1:8000/api/emp_logout`, {
            method: "POST",
            headers: {
                "Content-type": "application/json",
                Authorization: "Bearer " + tokenn
            },
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                sessionStorage.clear();
                alert(data.Message);
                window.location.href = '/api/emp_login';
            } else {
                alert("Error_Occured..!!!");
            }
        })
    }
</script>

<script>
    function show_tbl() {
        const acc_no = document.getElementById('chk_acc_no').value;
        if (acc_no == "") {
            alert("Account Number cannot be Empty..!!!");
            window.location.href = '/api/emp_home';
        }
        document.getElementById('table').innerHTML = `
            <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="acc_tbl">
                        <thead class="table-dark">
                            <tr>
                                <th>Account No.</th>
                                <th>Name</th>
                                <th>Account Type</th>
                                <th>PAN</th>
                                <th>Aadhaar</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
        `;

        fetch(`http://127.0.0.1:8000/api/acc_det/${acc_no}`, {
            method: "GET",
            headers: {
                "Content-type": "application/json"
            }
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                // alert(data.Message);
                const tdata = document.querySelector('#acc_tbl tbody');
                tdata.innerHTML = "";
                data.Acc_Details.forEach(pro => {
                    const row = `
                        <tr>
                            <td>${pro.Account_No}</td>
                            <td>${pro.Full_Name}</td>
                            <td>${pro.Acc_Type}</td>
                            <td>${pro.PAN}</td>
                            <td>${pro.UIDAI}</td>
                            <td>${pro.Mobile_No}</td>
                            <td>${pro.Status}</td>
                            <td><button class="btn btn-sm btn-success" onclick="return apporve()">Approve</button>
                                <button class="btn btn-sm btn-danger" onclick="return rej()">Reject</button></td>
                        </tr>`;
                    tdata.innerHTML += row;
                });
            } else if (data.Status == 404) {
                document.getElementById('table').innerHTML =
                    `<h3><center>Action Already Performed on Account ${acc_no}..!!!</center></h3>`;
            }
        });
    }
</script>

<script>
    function show_loan_acc() {
        const ln_acc_no = document.getElementById('chk_ln_acc_no').value;
        if (ln_acc_no == "") {
            alert("Loan Account Number cannot be Empty..!!!");
            window.location.href = '/api/emp_home';
        }
        document.getElementById('table_loan').innerHTML = `
            <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="ln_acc_tbl">
                        <thead class="table-dark">
                            <tr>
                                <th>Application_No</th>
                                <th>First_Name</th>
                                <th>Last_Name</th>
                                <th>Email</th>
                                <th>Phone_No</th>
                                <th>PAN Number</th>
                                <th>UIDAI Number</th>
                                <th>Loan_Type</th>
                                <th>Loan_Amount</th>
                                <th>Annual_Income</th>
                                <th>Repay_Tenure</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>`;
        fetch(`http://127.0.0.1:8000/api/loan_fetch/${ln_acc_no}`, {
            method: "GET",
            headers: {
                "Content-type": "application/json"
            }
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                const tdata = document.querySelector('#ln_acc_tbl tbody');
                tdata.innerHTML = "";
                data.Acc_details.forEach(pro => {
                    const row = `
                        <tr>
                            <td>${pro.Application_No}</td>
                            <td>${pro.First_Name}</td>
                            <td>${pro.Last_Name}</td>
                            <td>${pro.Email}</td>
                            <td>${pro.Phone_No}</td>
                            <td>${pro.PAN}</td>
                            <td>${pro.UIDAI}</td>
                            <td>${pro.Loan_Type}</td>
                            <td>${pro.Loan_Amount}.00</td>
                            <td>${pro.Annual_Income}.00</td>
                            <td>${pro.Repay_Tenure} Year(s)</td>
                            <td><button class="btn btn-sm btn-success" onclick="return ln_acc_app()">Approve</button>
                                <button class="btn btn-sm btn-danger" onclick="return ln_app_rej()">Reject</button></td>
                        </tr>`;
                    tdata.innerHTML += row;
                });
            } else if (data.Status == 404) {
                document.getElementById('table_loan').innerHTML =
                    `<h3><center>Action Already Performed on Account ${ln_acc_no}..!!!</center></h3>`;
            }
        })
    }
</script>

<script>
    function ln_acc_app() {
        const acc = document.getElementById('chk_ln_acc_no').value;
        fetch(`http://127.0.0.1:8000/api/ln_acc_approve/${acc}`, {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            }
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                alert(data.Message);
                window.location.href = '/api/emp_home';
            } else if (data.Status == 404) {
                alert('Something went wrong..!!!');
            }
        });
    }

    function ln_app_rej() {
        const accc = document.getElementById('chk_ln_acc_no').value;
        fetch(`http://127.0.0.1:8000/api/ln_acc_reject/${accc}`, {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            }
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                alert(data.Message);
                window.location.href = '/api/emp_home';
            } else if (data.Status == 404) {
                alert('Something went wrong..!!!');
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    function apporve() {
        const acc_n = document.getElementById('chk_acc_no').value;
        fetch(`http://127.0.0.1:8000/api/acc_app/${acc_n}`, {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            }
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                const time = 5000;
                Toastify({
                    escapeMarkup: false,
                    duration: time,
                    text: data.Message,
                    gravity: 'top',
                    potision: "right",
                    backgroundColor: "lightgreen",
                    color: "black",
                    close: false
                }).showToast();
                setTimeout(() => {
                    window.location.href = "/api/emp_home";
                }, time);

            } else if (data.Status == 404) {
                Toastify({
                    escapeMarkup: false,
                    duration: 5000,
                    text: data.Message,
                    gravity: 'top',
                    potision: "right",
                    backgroundColor: "red",
                    close: false
                }).showToast();
            }
        });
    }

    function rej() {
        const acc_nn = document.getElementById('chk_acc_no').value;
        fetch(`http://127.0.0.1:8000/api/acc_rej/${acc_nn}`, {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            }
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                const time = 5000;
                Toastify({
                    escapeMarkup: false,
                    duration: time,
                    text: data.Message,
                    gravity: 'top',
                    potision: "right",
                    backgroundColor: "red",
                    close: false
                }).showToast();

                setTimeout(() => {
                    window.location.href = '/api/emp_home';
                }, time)
            } else if (data.Status == 404) {
                console.log(data.Message);
            }
        })
    }
</script>

<script>
    function regCus() {
        const asd = document.getElementById('reg_acc_no').value;
        fetch(`http://127.0.0.1:8000/api/cus_reg/${asd}`, {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            }
        }).then(res => res.json()).then(data => {
            if (data.Status == 200) {
                fetch(`http://127.0.0.1:8000/api/send_pass/${asd}`, {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json"
                    }
                }).then(res => res.json()).then(data => {
                    console.log(data);
                    if (data.Status == 200) {
                        Toastify({
                            text: data.Message,
                            duration: 3000,
                            backgroundColor: "green",
                            gravity: "top",
                            position: 'right',
                            close: false
                        }).showToast();

                        setTimeout(() => {
                            window.location.href = "/api/emp_home";
                        }, 3000)
                    } else if (data.Status == 404) {
                        alert(data.Message);
                    }
                })
            } else if (data.Status == 404) {
                alert(data.Message);
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.all.min.js"></script>
<script>
    function ln_deb_amt() {
        const mmm = document.getElementById('app_no').value;
        const fff = document.getElementById('months').value;
        if (fff == "" || mmm == "") {
            Toastify({
                text: "Data Cannot be Empty",
                duration: 3000,
                backgroundColor: "hotpink",
                gravity: "top",
                position: "right",
                close: false
            }).showToast();
        } else {
            fetch(`http://127.0.0.1:8000/api/loan_debit/${mmm}`, {
                method: "POST",
                headers: {
                    "Content-type": "application/json"
                },
                body: JSON.stringify({
                    Months: fff,
                }),
            }).then(res => res.json()).then(data => {
                if (data.Status == 200) {
                    Swal.fire({
                        title: data.Message,
                        icon: "success"
                    }).then(res=>{
                        if(res.isConfirmed)
                        {
                            window.location.href = '/api/emp_home';
                        }
                    });
                } else if (data.Status == 404) {
                    Swal.fire({
                        title: data.Message,
                        icon: "error"
                    }).then(res=>{
                        if(res.isConfirmed)
                        {
                            window.location.href = '/api/emp_home';
                        }
                    });
                } else {
                    alert("SomeThing went wrong..!!!");
                }
            });
        }
    }
</script>