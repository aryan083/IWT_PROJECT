document.addEventListener("DOMContentLoaded", function() {
    // Dynamically add input fields for contributors
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
                fileCount--; // Decrement file count
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
