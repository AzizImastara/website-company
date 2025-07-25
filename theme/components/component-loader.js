/**
 * Component Loader
 * Loads HTML components into specified elements
 */

// Function to load HTML components
function loadComponent(elementId, componentPath) {
  const element = document.getElementById(elementId);
  if (element) {
    fetch(componentPath)
      .then((response) => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.text();
      })
      .then((html) => {
        element.innerHTML = html;
      })
      .catch((error) => {
        console.error("Error loading component:", error);
        element.innerHTML = "<p>Error loading component</p>";
      });
  }
}

// Load components when DOM is ready
document.addEventListener("DOMContentLoaded", function () {
  // Load navbar component
  loadComponent("navbar-container", "components/navbar.html");

  // Load footer component
  loadComponent("footer-container", "components/footer.html");
});

// Alternative function for manual loading
function loadComponents() {
  loadComponent("navbar-container", "components/navbar.html");
  loadComponent("footer-container", "components/footer.html");
}
