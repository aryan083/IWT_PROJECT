document.addEventListener("DOMContentLoaded", function() {

    const addContributorBtn = document.getElementById('addContributor');
    const contributorsSection = document.getElementById('contributorsSection');
    let contributorCount = 1; // Initial contributor count

    addContributorBtn.addEventListener('click', function() {
        if (contributorCount < 5) { // Check if the limit is not reached
            const div = document.createElement('div');
            div.classList.add('contributor');

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'contributors[]';
            input.placeholder = 'Contributor Name';
            input.required = true;

            const select = document.createElement('select');
            select.name = 'roles[]';
            select.required = true;

            const roles = ['Select Role', 'Leader', 'Developer', 'Designer'];
            roles.forEach(role => {
                const option = document.createElement('option');
                option.value = role.toLowerCase();
                option.textContent = role;
                select.appendChild(option);
            });

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.textContent = 'Remove';
            removeBtn.addEventListener('click', function() {
                div.remove();
                contributorCount--; // Decrement contributor count
            });

            div.appendChild(input);
            div.appendChild(select);
            div.appendChild(removeBtn);
            contributors.appendChild(div);

            contributorCount++; // Increment contributor count
        } else {
            alert('Maximum 5 contributors allowed.');
        }
    });

    // Add and remove file inputs dynamically
    const addMoreFilesBtn = document.getElementById('addMoreFiles');
    const fileInputs = document.getElementById('fileInputs');
    let fileCount = 1; // Initial file count

    addMoreFilesBtn.addEventListener('click', function() {
        if (fileCount < 10) { // Check if the limit is not reached
            const fileInputWrapper = document.createElement('div');
            fileInputWrapper.classList.add('file-input-wrapper');
            
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.name = 'projectFiles[]';
            fileInput.accept = 'image/*, video/*';
            fileInput.required = true;

            const removeFileBtn = document.createElement('button');
            removeFileBtn.type = 'button';
            removeFileBtn.classList.add('remove-file-btn');
            removeFileBtn.innerHTML = '<i class="fa fa-times"></i>';
            removeFileBtn.addEventListener('click', function() {
                fileInputWrapper.remove();
                fileCount--; // Decrement file count for media files
            });

            fileInputWrapper.appendChild(fileInput);
            fileInputWrapper.appendChild(removeFileBtn);
            fileInputs.appendChild(fileInputWrapper);

            fileCount++; // Increment file count
        } else {
            alert('Maximum 10 files allowed.');
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

/*SDL Cycle 
**Requriment gathering
**analysis
**planning after planning  Software Requirements Specification (SRS) document
**Implemation
**Testing/Trubbleshooting/Debugging
**Deployment
**Maintainance

*/

document.addEventListener("DOMContentLoaded", function() {
    const mainContainer = document.getElementById('mainContainer');
    const loginOptions = document.getElementById('loginOptions');
    const backButton = document.getElementById('backButton');
    const forgotPassword = document.getElementById('forgotPassword');
    const newUser = document.getElementById('newUser');

    // Login option elements
    const parentLoginOption = document.getElementById('parentLoginOption');
    const studentLoginOption = document.getElementById('studentLoginOption');
    const facultyLoginOption = document.getElementById('facultyLoginOption');

    // Login forms
    const parentForm = document.getElementById('parentForm');
    const studentForm = document.getElementById('studentForm');
    const facultyForm = document.getElementById('facultyForm');

    // Function to update the selected login option and styling
    function updateSelectedLoginOption(optionElement) {
        loginOptions.style.display = 'none';
        backButton.style.display = 'block';
        forgotPassword.style.display = 'block';
        newUser.style.display = 'block';

        parentForm.classList.remove('active');
        studentForm.classList.remove('active');
        facultyForm.classList.remove('active');

        const selectedOption = optionElement.id;

        if (selectedOption === 'parentLoginOption') {
            parentForm.classList.add('active');
        } else if (selectedOption === 'studentLoginOption') {
            studentForm.classList.add('active');
        } else if (selectedOption === 'facultyLoginOption') {
            facultyForm.classList.add('active');
        }

        // Remove 'selected' class from all options
        parentLoginOption.classList.remove('selected');
        studentLoginOption.classList.remove('selected');
        facultyLoginOption.classList.remove('selected');

        // Add 'selected' class to the clicked option
        optionElement.classList.add('selected');
    }

    // Event listeners for login options
    parentLoginOption.addEventListener('click', function() {
        updateSelectedLoginOption(parentLoginOption);
    });

    studentLoginOption.addEventListener('click', function() {
        updateSelectedLoginOption(studentLoginOption);
    });

    facultyLoginOption.addEventListener('click', function() {
        updateSelectedLoginOption(facultyLoginOption);
    });

    // Event listener for back button
    backButton.addEventListener('click', function() {
        loginOptions.style.display = 'flex';
        backButton.style.display = 'none';
        parentForm.classList.remove('active');
        studentForm.classList.remove('active');
        facultyForm.classList.remove('active');
        forgotPassword.style.display = 'none';
        newUser.style.display = 'none';
    });

    // Event listener for login form submission
    parentForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const loginDetails = {
            option: 'parent',
            email: document.getElementById('parentEmail').value,
            name: document.getElementById('studentName').value,
        };
        console.log(loginDetails);
    });

    studentForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const loginDetails = {
            option: 'student',
            email: document.getElementById('studentEmail').value,
            password: document.getElementById('studentPassword').value,
        };
        console.log(loginDetails);
    });

    facultyForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const loginDetails = {
            option: 'faculty',
            employmentCode: document.getElementById('employmentCode').value,
            yearOfJoining: document.getElementById('yearOfJoining').value,
        };
        console.log(loginDetails);
    });
});