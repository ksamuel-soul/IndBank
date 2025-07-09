<script>
    const token = sessionStorage.getItem('token');
    if(!token)
    {
        alert("Login_First");
        window.location.href = "/api/cus_login";
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Transfer Funds | IndBank</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
            <div class="d-flex ms-auto">
                <a href="/api/cus_home" class="btn btn-gradient me-2">Customer Home</a>
                <a onclick="return logout()" style="cursor: pointer;" class="btn btn-gradient">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">Transfer Funds</h1>
            <p class="lead mb-0">Move money securely between your own accounts or to beneficiaries.</p>
        </div>
    </section>

    <!-- Transfer Form Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="mb-4 text-center">Transfer Details</h4>
                            <form novalidate id="transfer_form">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="fromAccount" class="form-label">From Account</label>
                                        <input type="text" id="Acc_No" disabled class="form-control" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="transferMode" class="form-label">Transfer Mode</label>
                                        <select id="transferMode" class="form-select" required>
                                            <option value="" disabled selected>Select Mode</option>
                                            <option value="IMPS">IMPS (Instant)</option>
                                            <option value="NEFT">NEFT</option>
                                            <option value="RTGS">RTGS</option>
                                            <option value="UPI">UPI</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="benefName" class="form-label">Beneficiary Name</label>
                                        <input type="text" id="benefName" class="form-control" placeholder="e.g., Rohan Kumar" disabled />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="benefAccount" class="form-label">Beneficiary Account No.</label>
                                        <input type="text" id="benefAccount" class="form-control" placeholder="16‑digit A/C" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ifsc" class="form-label">IFSC Code</label>
                                        <input type="text" id="ifsc" class="form-control" placeholder="BANK0123456" maxlength="11" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="amount" class="form-label">Amount (₹)</label>
                                        <input type="number" id="amount" class="form-control" placeholder="e.g., 5000" min="1" required />
                                    </div>
                                    <div class="col-12">
                                        <label for="remarks" class="form-label">Remarks (optional)</label>
                                        <input type="text" id="remarks" class="form-control" placeholder="Description of transfer" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="otp" class="form-label">OTP</label>
                                        <div class="input-group">
                                            <input type="text" id="otp" class="form-control" placeholder="Enter OTP" required />
                                            <button class="btn btn-outline-secondary" type="button" id="getOtp">Get OTP</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" id="submit" class="btn btn-gradient btn-lg">Submit Transfer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white text-center py-3">
        <div class="container">
            <small>&copy; 2025 IndBank. Secure Banking for Everyone.</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Simple validation/OTP placeholder script -->
    <script>
        const email = sessionStorage.getItem('email');
        (function() {
            const form = document.getElementById('transferForm');
            const otpBtn = document.getElementById('getOtp');
            otpBtn.addEventListener('click', () => {
                fetch(`http://127.0.0.1:8000/api/send_otp/${email}`,{
                    method:"POST",
                    headers:{"Content-type":"application/json"}
                }).then(res=>res.json()).then(data=> {
                    if(data.Status == 200)
                    {
                        Toastify({
                            text: data.Message,
                            duration: 5000,
                            backgroundColor: "green",
                            position: "right",
                            gravity: "left"
                        }).showToast();   
                    }
                    else if(data.Status == 404)
                    {
                        Toastify({
                            text: data.Message,
                            duration: 5000,
                            backgroundColor: "red",
                            position: "right",
                            gravity: "left"
                        }).showToast(); 
                    }
                });
                otpBtn.textContent = 'OTP Sent';
                otpBtn.classList.add('disabled');
                setTimeout(() => {
                    otpBtn.textContent = 'Resend OTP';
                    otpBtn.classList.remove('disabled');
                }, 3000); // 30s cooldown
            });
        })();
    </script>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.all.min.js"></script>

<script>
    const acc_no = sessionStorage.getItem('acc_no');
    document.getElementById('Acc_No').value = acc_no;
</script>

<script>
    const ac = document.getElementById('benefAccount');
    ac.addEventListener('input', ()=>{
        const acct = ac.value.trim();
        if (!acct) return;
        fetch(`http://127.0.0.1:8000/api/get_details/${acct}`, {
            method:"GET",
            headers: {"Content-type":"application/json"}
        }).then(res=>res.json()).then(data=>{
            if(data.Status == 200)
            {
                document.getElementById('benefName').value = data.Name;
            }
            else if(data.Status == 404)
            {
                document.getElementById('benefName').value = "No Such Account..!!!";
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    const form = document.getElementById('transfer_form');
    const acc_no123 = sessionStorage.getItem('acc_no');
    form.addEventListener("submit", function(e){
        e.preventDefault();
        const d = {
            Enter_OTP: document.getElementById('otp').value
        };

        fetch(`http://127.0.0.1:8000/api/chk_otp`, {
            method:"POST",
            headers: {"Content-type":"application/json"},
            body: JSON.stringify(d)
        }).then(res=>res.json()).then(data=>{
            if(data.Status == 200)
            {
                Toastify({
                            text: data.Message,
                            duration: 5000,
                            backgroundColor: "green",
                            position: "right",
                            gravity: "left"
                }).showToast(); 
                const dataset = {
                    Description: document.getElementById('remarks').value,
                    Type: "Debit",
                    Mode: document.getElementById('transferMode').value,
                    To: document.getElementById('benefAccount').value,
                    Amount: document.getElementById('amount').value,
                };

                fetch(`http://127.0.0.1:8000/api/debit/${acc_no123}`, {
                    method:'POST',
                    headers:{"Content-type":"application/json"},
                    body:JSON.stringify(dataset)
                    }).then(res=>res.json()).then(data=>{
                    if(data.Status == 200)
                    {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: data.Message + "\n" +`With the Transaction Id: ` + data.Transaction_Details.Transaction_Id,
                        }).then(res=>{
                            if(res.isConfirmed)
                            {
                                window.location.href = '/api/tr_funds'
                            }
                        });
                    }
                    else if(data.Status == 404)
                    {
                        Toastify({
                            text: data.Message,
                            duration: 5000,
                            backgroundColor: "red",
                            position: "right",
                            gravity: "left",
                            close: false
                        }).showToast();

                        setTimeout( ()=>{
                            window.location.href = "/api/tr_funds";
                        }, 6000);
                    }
                });
            }
            else if(data.Status == 404)
            {
                Toastify({
                    text: data.Message,
                    duration: 5000,
                    backgroundColor: "red",
                    position: "right",
                    gravity: "left",
                    close: false
                }).showToast();
            }
            else
            {
                Toastify({
                    text: "SomeThing Went Wrong..!!!",
                    duration: 5000,
                    backgroundColor: "yellow",
                    position: "right",
                    gravity: "left"
                }).showToast();
            }
        })
    });
</script>

<script>
    function logout()
    {
        const token = sessionStorage.getItem('token');
        fetch(`http://127.0.0.1:8000/api/cus_logout`, {
            method:"POST",
            headers:{"Content-type":"application/json", Authorization:"Bearer " + token}
        }).then(res=>res.json()).then(data=>{
            if(data.Status == 200)
            {
                sessionStorage.clear();
                alert(data.Message);   
                window.location.href = "/api/cus_login";
            }
        });
    }
</script>