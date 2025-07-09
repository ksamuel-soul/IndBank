<script>
    const token = sessionStorage.getItem('token');
    if(!token)
    {
        alert('Login First');
        window.location.href = "/api/cus_login";
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Account Summary | IndBank</title>
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
        <div class="d-flex ms-auto">
            <a href="/api/cus_home" class="btn btn-gradient">Customer Home</a>
            <a onclick="return logout()" style="cursor: pointer;" class="btn btn-gradient ms-2">Logout</a>
        </div>
    </div>
</nav>


    <!-- Hero -->
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">Account Summary</h1>
            <p class="lead">Overview of your balances and recent activity</p>
        </div>
    </section>

    <!-- Balances -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-piggy-bank fa-2x text-success mb-3"></i>
                            <h5 class="card-title">Savings Account</h5>
                            <h3 class="fw-bold">₹<span id="amt"> </span></h3>
                            <p class="text-muted mb-0">A/C No. ****<span id="acc_no"> </span></p>
                        </div>
                    </div>
                </div>
                <!-- Current Account Details -->
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-briefcase fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">Loan Account</h5>
                            <h3 class="fw-bold">₹<span id="ln_amt"> </span></h3>
                            <p class="text-muted mb-0">A/C No. ****<span id="ln_acc"> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-file-invoice-dollar fa-2x text-warning mb-3"></i>
                            <h5 class="card-title">Fixed Deposits</h5>
                            <h3 class="fw-bold">₹00.00</h3>
                            <p class="text-muted mb-0">A/C No. ****0000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Transactions -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Recent Transactions</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="trans_tbl">
                    <thead class="table-dark">
                        <tr>
                            <th>Transaction_Id</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Mode</th>
                            <th>Amount (₹)</th>
                            <th>Balance (₹)</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h3 class="text-center mb-4">Loan Application(s)</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="ln_app">
                    <thead class="table-dark">
                        <tr>
                            <th>Application_Number</th>
                            <th>Application_Status</th>
                            <th>Loan_Type</th>
                            <th>Loan_Amount</th>
                            <th>Repay Tenure</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
      </section>

      <section class="py-5">
        <div class="container">
            <h3 class="text-center mb-4">Loan Amount Debit Details</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="ln_amt_debit_app">
                    <thead class="table-dark">
                        <tr>
                            <th>Application_No</th>
                            <th>Account_No</th>
                            <th>Total Loan Amount</th>
                            <th>Repay_Tenure</th>
                            <th>EMI</th>
                            <th>Month</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
      </section>

    <!-- Quick Actions -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">Quick Actions</h2>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="/api/tr_funds" class="btn btn-gradient px-4">Transfer Funds</a>
                <a href="/api/loan_app" class="btn btn-gradient px-4">Apply Loan</a>
                <a href="#" class="btn btn-gradient px-4">Pay Bills</a>
                <a onclick="return down()" style="cursor: pointer;" class="btn btn-gradient px-4">Download Statement</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white text-center py-3">
        <div class="container">
            <small>&copy; 2025 IndBank. Secure Banking for Everyone.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    th, td{
        text-align: center;
    }
</style>

<script>
    const acc_no = sessionStorage.getItem('acc_no');
    fetch(`http://127.0.0.1:8000/api/amt/${acc_no}`, {
        method:"GET",
        headers:{"Content-type":"application/json"}
    }).then(res=>res.json()).then(data=>{
        if(data.Status == 200)
        {
            var x = [];
            document.getElementById('amt').innerHTML = data.amount;
            for(var i=6; i<data.acc_no.length; i++)
            {
                x.push(data.acc_no[i]);
            }
            document.getElementById('acc_no').innerHTML = x.join("");
        }
        else
        {
            alert("Error Occured..!!");
        }
    });
</script>

<script>
    const acc = sessionStorage.getItem('acc_no');
    fetch(`http://127.0.0.1:8000/api/trans_det/${acc}`, {
        method: "GET",
        headers: {"Content-type":"application/json"},
    }).then(res=>res.json()).then(data=>{
        if(data.Status == 200)
        {
            tdata = document.querySelector("#trans_tbl tbody");
            tdata.innerHTML = "";
            data.To_Records.forEach(pro=>{
                let c = pro.Date;
                const ist = new Date(c).toLocaleString("en-US", {timeZone: 'Asia/Kolkata'})
                const row = `
                    <tr>
                        <td>${pro.Transaction_Id}</td>
                        <td>${pro.From}</td>
                        <td>${pro.To}</td>
                        <td>${ist}</td>
                        <td>${pro.Description}</td>
                        <td><span class="badge bg-success">Credit</span></td>
                        <td>${pro.Mode}</td>
                        <td>${pro.Amount}.00</td>
                        <td>${pro.T_Balance}.00</td>
                    </tr>`;

                tdata.innerHTML += row;
            })

            data.From_Records.forEach(pro=>{
                let c = pro.Date;
                const ist = new Date(c).toLocaleString("en-US", {timeZone: 'Asia/Kolkata'})
                const row = `
                    <tr>
                        <td>${pro.Transaction_Id}</td>
                        <td>${pro.From}</td>
                        <td>${pro.To}</td>
                        <td>${ist}</td>
                        <td>${pro.Description}</td>
                        <td><span class="badge bg-danger">Debit</span></td>
                        <td>${pro.Mode}</td>
                        <td>${pro.Amount}.00</td>
                        <td>${pro.F_Balance}.00</td>
                    </tr>`;

                tdata.innerHTML += row;
            })
        }
        else if(data.Status == 404)
        {
            alert(data.Message);
        }
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

<script>
  const ln_acc = sessionStorage.getItem('email');
  fetch(`http://127.0.0.1:8000/api/ln_fetch/${ln_acc}`, {
    method : "GET",
    headers :{"Content-type":"application/json"}
  }).then(res=>res.json()).then(data=>{
    if(data.Status == 200)
    {
        var xy = [];
        document.getElementById('ln_amt').innerHTML = data.Details[0].Loan_Amount + ".00";
        for(var i=5; i<data.Details[0].Application_No.length; i++)
        {
            xy.push(data.Details[0].Application_No[i]);
        }
        document.getElementById('ln_acc').innerHTML = xy.join("");
    }
    else{
      alert("Some Thing went wrong..!!!");
    }
  });
</script>

<script>
  window.onload = function fetch_loan_appliaction_details(){
    const emm = sessionStorage.getItem('email');
    fetch(`http://127.0.0.1:8000/api/ln_fetch/${emm}`, {
      method:"GET",
      headers: {"Content-type":"application/json"}
    }).then(res=>res.json()).then(data=>{
      if(data.Status == 200)
      {
        const tdata = document.querySelector('#ln_app tbody');
        tdata.innerHTML = "";
        data.Details.forEach(pro =>{
          const aps = pro.App_Status;
          const row = `
                      <tr>
                        <td>${pro.Application_No}</td>
                        <td id='apss'>${pro.App_Status}</td>
                        <td>${pro.Loan_Type}</td>
                        <td>₹${pro.Loan_Amount}.00</td>
                        <td>${pro.Repay_Tenure} year(s)</td>
                      </tr>`;
                tdata.innerHTML += row;
                aps == "Reject" ? document.getElementById('apss').style.color = 'red' : aps == "Approve" ? document.getElementById('apss').style.color = 'green' : document.getElementById('apss').style.color = 'gold';
        });
      }
      else if(data.Status == 404)
      {
        const tdata = document.querySelector('#ln_app tbody');
          const row = `
                      <tr>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                      </tr>`;
      }
      else
      {
        console.log("Error_Occurred..!!!");
      }
    });
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
<script>
    function down(){
        const {jsPDF} = window.jspdf;
        const doc = new jsPDF();
        const account = sessionStorage.getItem('acc_no');
        doc.autoTable({
            html: '#trans_tbl',
        });
        doc.save(`Account Statement of ${account}.pdf`);
    }
</script>

<script>
    const asd = sessionStorage.getItem('acc_no');
    fetch(`http://127.0.0.1:8000/api/get_ln_dbt_amt/${asd}`, {
        method:"GET",
        headers: {"Content-type":"application/json"}
    }).then(res=>res.json()).then(data=>{
        if(data.Details == [])
        {
            // console.log("No Transactions have been made yet..!!!");   
        }
        else
        {
            const tdata = document.querySelector('#ln_amt_debit_app tbody');
            tdata.innerHTML = "";
            data.Details.forEach(pro=>{
                const row = `
                            <tr>
                                <td>${pro.Application_No}</td>
                                <td>${pro.Account_No}</td>
                                <td>${pro.Total_Loan_Amt}</td>
                                <td>${pro.Repay_Tenure}</td>
                                <td>${pro.EMI}</td>
                                <td>${pro.Months}</td>
                            </tr>`;
                    tdata.innerHTML += row;
            })
        }
    });
</script>