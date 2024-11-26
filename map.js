// Initialize the map
let map;

function initMap() {
  // Create the map and center it on India (lat, lng)
  map = L.map("map").setView([20.5937, 78.9629], 5); // Center: India

  // Add OpenStreetMap tiles
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: "© OpenStreetMap contributors",
  }).addTo(map);
}

// Use the browser's Geolocation API to locate the user
function locateUser() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const { latitude, longitude } = position.coords;

        // Center the map on the user's location
        map.setView([latitude, longitude], 15);

        // Add a marker for the user's location
        L.marker([latitude, longitude])
          .addTo(map)
          .bindPopup("You are here")
          .openPopup();
      },
      () => {
        alert("Unable to fetch your location. Please allow location access.");
      }
    );
  } else {
    alert("Geolocation is not supported by your browser.");
  }
}

// Initialize the map and locate the user on page load
window.onload = () => {
  initMap();
  locateUser();
};
