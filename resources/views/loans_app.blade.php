<script>
  const t = sessionStorage.getItem('token');
  if (!t) {
    alert('Login first');
    window.location.href = "/api/cus_login";
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Loan Application | IndBank</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />
  <style>
    .navbar-gradient {
      background: linear-gradient(135deg, #ff6a00, #ee0979);
    }

    .hero {
      background: linear-gradient(135deg, #ff7e5f, #feb47b);
    }

    .btn-gradient {
      background: linear-gradient(to right, #43cea2, #185a9d);
      border: none;
      color: white;
    }

    .btn-gradient:hover {
      background: linear-gradient(to right, #11998e, #38ef7d);
    }

    footer {
      background: linear-gradient(135deg, #ff6a00, #ee0979);
    }
    td, th{
      text-align: center;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-gradient">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">IndBank</a>
      <div class="d-flex">
        <a href="/api/cus_home" class="btn btn-gradient me-2">Customer Home</a>
        <a onclick="return logout()" class="btn btn-gradient">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Loan Application Section -->
  <section class="hero text-dark py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow">
            <div class="card-body p-4">
              <h3 class="text-center mb-4">Loan Application Form</h3>
              <form id="loanAppForm" method="POST">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" disabled id="firstName" required />
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="firstName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" required />
                  </div>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email Address</label>
                  <input type="email" class="form-control" disabled id="email" required />
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input type="tel" class="form-control" id="phone" required />
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="pan" class="form-label">PAN Number</label>
                    <input type="text" placeholder="Pan Card no." disabled class="form-control" id="pan" required />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="uidai" class="form-label">UIDAI Number</label>
                    <input type="text" placeholder="Aadhaar Card No." disabled class="form-control" id="uidai" required />
                  </div>
                </div>
                <div class="mb-3">
                  <label for="loanType" class="form-label">Loan Type</label>
                  <select class="form-select" id="loanType" required>
                    <option value="">Select Loan Type</option>
                    <option value="Home Loan">Home Loan</option>
                    <option value="Car Loan">Car Loan</option>
                    <option value="Education Loan">Education Loan</option>
                    <option value="Personal Loan">Personal Loan</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="loanAmount" class="form-label">Loan Amount (₹)</label>
                  <input type="number" class="form-control" id="loanAmount" required />
                </div>
                <div class="mb-3">
                  <label for="income" class="form-label">Annual Income (₹)</label>
                  <input type="number" class="form-control" id="income" required />
                </div>
                <div class="mb-3">
                  <label for="tenure" class="form-label">Repayment Tenure (Years)</label>
                  <select class="form-select" id="tenure" required>
                    <option value="">Select Tenure</option>
                    <option value="1">1 Year</option>
                    <option value="3">3 Years</option>
                    <option value="5">5 Years</option>
                    <option value="10">10 Years</option>
                    <option value="15">15 Years</option>
                  </select>
                </div>
                <div class="d-grid">
                  <button type="submit" id="submit" class="btn btn-gradient">Submit Application</button>
                </div>
                <hr>
      <section class="py-2">
        <div class="container">
            <h3 class="text-center mb-4">Application(s)</h3>
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
              </form>
              <div id="formMsg" class="mt-3 text-center text-success"></div>
            </div>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
  function logout() {
    const token = sessionStorage.getItem('token');
    fetch(`http://127.0.0.1:8000/api/cus_logout`, {
      method: "POST",
      headers: {
        "Content-type": "application/json",
        Authorization: "Bearer " + token
      }
    }).then(res => res.json()).then(data => {
      if (data.Status == 200) {
        sessionStorage.clear();
        alert(data.Message);
        window.location.href = "/api/cus_login";
      }
    });
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.js"></script>
<script>
  const form = document.getElementById('loanAppForm');
  const em = sessionStorage.getItem('email');
  document.getElementById('email').value = em;
  form.addEventListener("submit", function(e) {
    e.preventDefault();
    const data = {
      First_Name: document.getElementById('firstName').value,
      Last_Name: document.getElementById('lastName').value,
      Email: em,
      Phone_No: document.getElementById('phone').value,
      PAN: document.getElementById('pan').value,
      UIDAI: document.getElementById('uidai').value,
      Loan_Type: document.getElementById('loanType').value,
      Loan_Amount: document.getElementById('loanAmount').value,
      Annual_Income: document.getElementById('income').value,
      Repay_Tenure: document.getElementById('tenure').value
    };

    fetch(`http://127.0.0.1:8000/api/loan_application`, {
      method:"POST",
      headers:{"Content-type":"application/json"},
      body:JSON.stringify(data)
    }).then(res=>res.json()).then(data=>{
      if(data.Status == 200)
      {
        Swal.fire({
          icon: "success",
          title: "Application Created",
          text: "Application Created with Application_No: " + data.Details.Application_No,
        }).then(res => {
          if(res.isConfirmed)
          {
            window.location.href = '/api/loan_app'; 
          }
        });
      }
      else if(data.Status == 404)
      {
        Swal.fire({
          icon: "error",
          title: data.Message,
        }).then(result=>{
          if(result.isConfirmed){
            window.location.href = '/api/loan_app';
          }
        });
      }
      else{
        Toastify({
          text: "Some Thing went wrong..!!!",
          duration: 5000,
          backgroundColor: red,
          position: "right",
          garvity: "top",
          close: false
        }).showToast();
      }
    });
  })
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

<script>
  const emails = document.getElementById('email').value;
  fetch(`http://127.0.0.1:8000/api/ln_f/${emails}`, {
    method : "GET",
    headers : {"Content-type":"application/json"}
  }).then(res=>res.json()).then(data =>{
    if(data.Status == 200)
    {
      document.getElementById('firstName').value = data.Details.Full_Name;
      document.getElementById('pan').value = data.Details.PAN;
      document.getElementById('uidai').value = data.Details.UIDAI;
    }
    else
    {
      Toastify({
        text: "Some Thing went wrong..!!!",
        duration: 5000,
        close: false,
        backgroundColor: "red",
        gravity: "top",
        position: 'right'
      }).showToast();
    }
  });
</script>