<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile Settings | IndBank</title>
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
        <a href="/api/dashboard" class="btn btn-gradient me-2">Customer Home</a>
        <a onclick="return logout()" class="btn btn-gradient" style="cursor: pointer;">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero text-white text-center py-5">
    <div class="container">
      <h1 class="display-5 fw-bold">Profile Settings</h1>
      <p class="lead">Update your personal details and preferences securely.</p>
    </div>
  </section>

  <!-- Settings Form -->
  <section class="py-5 bg-light">
    <div class="container">
      <form id="profileForm" method="POST">
        <div class="row g-4">
          <div class="col-md-6">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" id="name" class="form-control" placeholder="Enter your full name" required />
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" placeholder="example@indbank.com" required />
          </div>
          <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" id="phone" class="form-control" placeholder="e.g., 9876543210" required />
          </div>
          <div class="col-md-6">
            <label for="password" class="form-label">New Password</label>
            <input type="password" id="password" class="form-control" placeholder="Enter new password" />
          </div>
          <div class="col-12">
            <label for="preferences" class="form-label">Communication Preference</label>
            <select class="form-select" id="preferences">
              <option selected disabled>Select preference</option>
              <option>Email Notifications</option>
              <option>SMS Notifications</option>
              <option>Both Email and SMS</option>
              <option>None</option>
            </select>
          </div>
          <div class="col-12 d-grid">
            <button type="submit" class="btn btn-gradient btn-lg mt-3">Save Changes</button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-white text-center py-3">
    <div class="container">
      <small>&copy; 2025 IndBank. Profile Management Portal.</small>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Optional: Form submission handler -->
  <script>
    function logout() {
      sessionStorage.clear();
      location.href = '/';
      return false;
    }

    document.getElementById("profileForm").addEventListener("submit", function (e) {
      e.preventDefault();
      alert("Profile updated successfully!");
      // Replace this alert with your actual API call.
    });
  </script>
</body>
</html>
