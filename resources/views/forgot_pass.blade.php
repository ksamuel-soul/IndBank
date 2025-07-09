<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Forgot Password | IndBank</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />
  <style>
    html, body {
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
    </div>
  </nav>

  <!-- Forgot Password Section -->
  <section class="hero py-5 text-white">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-body p-4">
              <h3 class="text-center text-dark mb-4">Forgot Password</h3>
              <form id="forgotPass">
                <div class="mb-3">
                  <label for="email" class="form-label">Registered Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3 d-flex">
                  <input type="text" class="form-control me-2" id="otp" placeholder="Enter OTP" required>
                  <button type="button" class="btn btn-gradient" id="sendOtp">Send OTP</button><p style="padding-left: 10px;"></p>
                  <button type="button" class="btn btn-gradient" id="verifyOtp">Verify OTP</button>
                </div>
                <span id="pass_sec"> </span>
                <!-- <div class="d-grid">
                  <button type="submit" class="btn btn-gradient" id="submit">Reset Password</button>
                </div> -->
              </form>
              <p class="mt-3 text-center"><a href="/api/cus_login">Back to Login</a></p>
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

  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.all.min.js"></script>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById("sendOtp").addEventListener("click", () => {
      const email = document.getElementById('email').value;
      if(email == "")
      {
        // alert("Email cannot be empty..!!!");
        Toastify({
          text: "Email cannot be empty..!!!",
          duration: 3000,
          close: false,
          garvity: "top",
          position: "right",
          backgroundColor: "hotpink"
        }).showToast();
      }
      else{
        fetch(`http://127.0.0.1:8000/api/send_otp_pass/${email}`,{
          method:"POST",
          headers: {"Content-type":"application/json"}
          }).then(res=>res.json()).then(data=>{
          if(data.Status == 200)
          {
              // alert("OTP Send..!!!");
              Toastify({
                text: data.Message,
                duration: 3000,
                close: false,
                garvity: "top",
                position: "right",
                backgroundColor: "green"
              }).showToast();
          }
          else if(data.Status == 404)
          {
            Toastify({
                text: data.Message,
                duration: 3000,
                close: false,
                garvity: "top",
                position: "right",
                backgroundColor: "hotpink"
              }).showToast();
          }
        });
      }
    });
  </script>

  <script>
    document.getElementById("verifyOtp").addEventListener("click", () => {
      const oottpp = document.getElementById('otp').value;
      if(oottpp == "")
      {
        // alert("Please Enter the OTP"); 
        Toastify({
          text: "Please Enter the OTP..!!!",
          duration: 3000,
          close: false,
          garvity: "top",
          position: "right",
          backgroundColor: "hotpink"
        }).showToast();
      }
      else{
        const dt = {
          Enter_OTP: document.getElementById('otp').value,
        }
        fetch(`http://127.0.0.1:8000/api/chk_otp_pass`, {
          method:"POST",
          headers: {"Content-type":"application/json"},
          body: JSON.stringify(dt)
        }).then(res=>res.json()).then(data=>{
          if(data.Status == 200)
          {
            // alert(data.Message);
            Toastify({
                text: data.Message,
                duration: 3000,
                close: false,
                garvity: "top",
                position: "right",
                backgroundColor: "green"
              }).showToast();
            document.getElementById('pass_sec').innerHTML = `
                  <div class="mb-3">
                  <label for="newPassword" class="form-label">New Password</label>
                  <input type="password" class="form-control" id="newPass" name="newPassword" placeholder="New Password" required>
                </div>
                <div class="mb-3">
                  <label for="confirmPassword" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" id="conPass" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-gradient" id="submit">Reset Password</button>
                </div>`;
          }
          else if(data.Status == 404)
          {
            Toastify({
                text: data.Message,
                duration: 3000,
                close: false,
                garvity: "top",
                position: "right",
                backgroundColor: "hotpink"
              }).showToast();
          }
        });
      }
    });
  </script>
</body>
</html>

<script>
  const form = document.getElementById('forgotPass');
  form.addEventListener('submit', function(e){
    e.preventDefault();
    const data = {
      pass:document.getElementById('newPass').value,
      pass_confirmation:document.getElementById('conPass').value
    };
    const emails = document.getElementById('email').value;
    const pass_chk1 = document.getElementById('newPass').value;
    const pass_chk2 = document.getElementById('conPass').value;
    if(pass_chk1 == "" || pass_chk2 == "")
    {
      alert("Please Enter the Password..!!!");
    }
    else{
      fetch(`http://127.0.0.1:8000/api/update_pass/${emails}`, {
        method:"POST",
        headers:{"Content-type":"application/json"},
        body:JSON.stringify(data)
      }).then(res=>res.json()).then(data=>{
        if(data.Status == 200)
        {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Password Updated...",
          });
          
          setTimeout(() => {
            window.location.href = "/api/cus_login";
          }, 3000);
        }
        else if(data.Status == 404)
        {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
          });
        }
      });
    }
  });
</script>
