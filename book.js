let map;
let selectedDriver = null;

// Mock driver locations (latitude, longitude, and driver name)
const drivers = [
  { id: 1, name: "Driver A", lat: 28.6139, lng: 77.2090 },
  { id: 2, name: "Driver B", lat: 28.6145, lng: 77.2085 },
  { id: 3, name: "Driver C", lat: 28.6150, lng: 77.2070 }
];

// Initialize the map
function initMap() {
  // Set default map location (e.g., center of the campus)
  const defaultLocation = { lat: 28.6139, lng: 77.2090 };

  // Initialize map
  map = new google.maps.Map(document.getElementById("map"), {
    center: defaultLocation,
    zoom: 15
  });

  // Add driver markers to the map
  drivers.forEach(driver => {
    const marker = new google.maps.Marker({
      position: { lat: driver.lat, lng: driver.lng },
      map,
      title: driver.name
    });

    // Click event to select a driver
    marker.addListener("click", () => {
      selectedDriver = driver;
      document.getElementById("selected-driver").value = driver.id;
      document.getElementById("selected-driver-info").innerText = `Selected Driver: ${driver.name}`;
    });
  });
}

// Form submission handler
document.getElementById("booking-form").addEventListener("submit", (e) => {
  e.preventDefault(); // Prevent default form submission

  if (!selectedDriver) {
    alert("Please select a driver on the map.");
    return;
  }

  alert(`Booking confirmed with ${selectedDriver.name}!`);
  // Further code to handle booking logic (e.g., send data to backend)
});
