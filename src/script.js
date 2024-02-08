document.addEventListener("DOMContentLoaded", function() {
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
});
