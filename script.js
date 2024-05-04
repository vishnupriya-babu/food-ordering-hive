function validateForm(event) {
  event.preventDefault(); // Prevent form submission

  // Get form values
  const fullName = document.getElementById('fullName').value;
  
  
  
  if (fullName.trim() === '') {
    alert('Please enter your full name.');
    return;
  }

  alert('Form submitted successfully!');

  window.location.href = 'index/home.html';
}
