document.addEventListener("DOMContentLoaded", function() {
    // Show/Hide fields based on project type
   // Dynamically add input fields for contributors
   const addContributorBtn = document.getElementById('addContributor');
   const contributorsSection = document.getElementById('contributorsSection');
   let contributorCount = 1; // Initial contributor count

   addContributorBtn.addEventListener('click', function() {
       if (contributorCount < 5) { // Check if the limit is not reached
           const input = document.createElement('input');
           input.type = 'text';
           input.name = 'contributors[]';
           input.placeholder = 'Contributor Name';
           input.required = true;
           contributorsSection.appendChild(input);
           contributorCount++; // Increment contributor count
       } else {
           alert('Maximum 5 contributors allowed.');
       }
   });

   // Show/hide fields based on project type
   const projectTypeSelect = document.getElementById('projectType');
   projectTypeSelect.addEventListener('change', function() {
       const contributorsInputs = document.querySelectorAll('input[name="contributors[]"]');
       if (this.value === 'software') {
           contributorsInputs.forEach(input => input.style.display = 'block');
       } else if (this.value === 'hardware') {
           contributorsInputs.forEach(input => input.style.display = 'none');
       }
   });
    const softwareFields = document.getElementById('softwareFields');
    const hardwareFields = document.getElementById('hardwareFields');

    projectTypeSelect.addEventListener('change', function() {
        if (this.value === 'software') {
            softwareFields.style.display = 'block';
            hardwareFields.style.display = 'none';
        } else if (this.value === 'hardware') {
            hardwareFields.style.display = 'block';
            softwareFields.style.display = 'none';
        } else {
            softwareFields.style.display = 'none';
            hardwareFields.style.display = 'none';
        }
    });

    // Handle form submissions (register, login, add project)
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Perform registration logic
        // Send data to server using AJAX or fetch API
    });

    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Perform login logic
        // Send data to server using AJAX or fetch API
    });

    document.getElementById('addProjectForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Perform add project logic
        // Send data to server using AJAX or fetch API
    });
    
});
