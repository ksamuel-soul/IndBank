<script>
    const t = sessionStorage.getItem('token');
    if(!t)
    {
        alert('Login first');
        window.location.href = "/api/cus_login";
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Customer Home | IndBank</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
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
      <div class="d-flex">
        <a onclick="return logout()" style="cursor: pointer;" class="btn btn-gradient">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Hero Welcome -->
  <section class="hero text-white text-center py-5">
    <div class="container">
      <h1 class="display-5 fw-bold">Welcome, <span id="name"> </span></h1>
      <script>
        const name = sessionStorage.getItem('name');
        document.getElementById('name').innerText = name;
      </script>
      <p class="lead">Access your accounts, manage funds, and explore banking services easily.</p>
    </div>
  </section>

  <!-- Dashboard Features -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Your Dashboard</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm text-center">
            <div class="card-body">
              <i class="fas fa-wallet fa-2x text-success mb-3"></i>
              <h5 class="card-title">Account Summary</h5>
              <p class="card-text">View savings and current account balances and statements.</p>
              <a href="/api/acc_sum" class="btn btn-gradient btn-sm">View Accounts</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm text-center">
            <div class="card-body">
              <i class="fas fa-exchange-alt fa-2x text-primary mb-3"></i>
              <h5 class="card-title">Fund Transfer</h5>
              <p class="card-text">Send money instantly via UPI, NEFT or IMPS.</p>
              <a href="/api/tr_funds" class="btn btn-gradient btn-sm">Transfer Funds</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm text-center">
            <div class="card-body">
              <i class="fas fa-credit-card fa-2x text-warning mb-3"></i>
              <h5 class="card-title">Cards & Limits</h5>
              <p class="card-text">Manage your debit cards and transaction limits easily.</p>
              <a href="#" class="btn btn-gradient btn-sm">Manage Cards</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-4 mt-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm text-center">
            <div class="p-4 border rounded text-center shadow-sm h-100">
              <i class="fas fa-file-invoice-dollar text-primary fa-2x mb-3"></i>
              <h5 class="fw-bold">Loan Application</h5>
              <p>Personal, Home, Car, and Education Loans tailored to your needs.</p>
              <a href="/api/loan_app" class="btn btn-gradient btn-sm">Apply Loan</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm text-center">
            <div class="card-body">
              <i class="fas fa-piggy-bank fa-2x text-danger mb-3"></i>
              <h5 class="card-title">Fixed Deposits</h5>
              <p class="card-text">Open or manage your FDs and check maturity details.</p>
              <a href="#" class="btn btn-gradient btn-sm">Manage FDs</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm text-center">
            <div class="card-body">
              <i class="fas fa-user-cog fa-2x text-secondary mb-3"></i>
              <h5 class="card-title">Profile Settings</h5>
              <p class="card-text">Update personal details, password, and preferences.</p>
              <a href="#" class="btn btn-gradient btn-sm">Update Profile</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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