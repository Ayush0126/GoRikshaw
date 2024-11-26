// Login Form Handling
document.getElementById("loginForm")?.addEventListener("submit", function (e) {
    e.preventDefault();
    alert("Login Successful!");
    window.location.href = "search.html";
  });
  
  // Search Form Handling
  document.getElementById("searchForm")?.addEventListener("submit", function (e) {
    e.preventDefault();
    const pickup = document.getElementById("pickup").value;
    const drop = document.getElementById("drop").value;
    localStorage.setItem("pickup", pickup);
    localStorage.setItem("drop", drop);
    alert("Search Successful!");
    window.location.href = "book.html";
  });
  
  // Booking Page Handling
  document.getElementById("pickupLocation")?.innerText = localStorage.getItem("pickup");
  document.getElementById("dropLocation")?.innerText = localStorage.getItem("drop");
  
  document.getElementById("confirmBooking")?.addEventListener("click", function () {
    alert("Booking Confirmed!");
    window.location.href = "payment.html";
  });
  
  // Payment Form Handling
  document.getElementById("paymentForm")?.addEventListener("submit", function (e) {
    e.preventDefault();
    alert("Payment Successful!");
    window.location.href = "map.html";
  });
  