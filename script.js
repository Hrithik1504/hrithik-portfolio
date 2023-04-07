// Function to submit the form data using AJAX
function submitForm() {
  // Get the form data
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const message = document.getElementById("message").value;

  // Create a new XMLHttpRequest object
  const xhr = new XMLHttpRequest();

  // Set up the request
  xhr.open("POST", "submit-form.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Send the request
  xhr.send(`name=${name}&email=${email}&message=${message}`);

  // Handle the response
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert(xhr.responseText);
    }
  };
}

// Add an event listener to the form submit button
document.querySelector("form").addEventListener("submit", function (e) {
  e.preventDefault();
  submitForm();
});
