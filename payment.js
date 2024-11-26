// Function to update payment options dynamically
function handlePaymentOptions() {
    const paymentOptions = document.querySelectorAll("input[name='payment']");
    paymentOptions.forEach(option => {
      option.addEventListener("change", () => {
        document.querySelectorAll(".card-details, .upi-details").forEach(detail => detail.classList.add("hidden"));
        if (option.value === "credit-card") {
          document.querySelector(".card-details").classList.remove("hidden");
        } else if (option.value === "upi") {
          document.querySelector(".upi-details").classList.remove("hidden");
        }
      });
    });
  }
  
  // Function to process payment
  function processPayment() {
    const selectedPayment = document.querySelector("input[name='payment']:checked").value;
    const pickup = localStorage.getItem("pickup") || "Downtown Street";
    const drop = localStorage.getItem("drop") || "City Mall";
    let paymentDetails = "";
  
    if (selectedPayment === "credit-card") {
      const cardNumber = document.getElementById("card-number").value;
      const expiryDate = document.getElementById("expiry-date").value;
      const cvv = document.getElementById("cvv").value;
      if (!cardNumber || !expiryDate || !cvv) {
        alert("Please enter all card details.");
        return;
      }
      paymentDetails = `Card Ending in ${cardNumber.slice(-4)}`;
    } else if (selectedPayment === "upi") {
      const upiId = document.getElementById("upi-id").value;
      if (!upiId) {
        alert("Please enter a valid UPI ID.");
        return;
      }
      paymentDetails = `UPI ID: ${upiId}`;
    } else if (selectedPayment === "wallet") {
      paymentDetails = "Digital Wallet";
    } else {
      paymentDetails = "Cash on Delivery";
    }
  
    alert(`Payment Successful!\nPickup: ${pickup}\nDrop: ${drop}\nPayment Method: ${paymentDetails}`);
  }
  
  // Event Listener for Pay Now button
  document.getElementById("payNow").addEventListener("click", processPayment);
  
  // Load dynamic booking details
  window.onload = () => {
    const pickupLocation = localStorage.getItem("pickup") || "Downtown Street";
    const dropLocation = localStorage.getItem("drop") || "City Mall";
    document.getElementById("pickup-location").textContent = pickupLocation;
    document.getElementById("drop-location").textContent = dropLocation;
  
    handlePaymentOptions(); // Attach event listeners to payment options
  };
  