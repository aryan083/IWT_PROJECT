// Global variables to keep track of added elements
var addedCollabCount = 0;
var addedMentorCount = 0;
var addedLinkCount = 0;

// Function to add collaborator fields
function add_collab(){
    var defaultCollabField = document.getElementById("default-add-collab-stuff");
    var clonedCollabField = defaultCollabField.cloneNode(true); // Clone the default field
    clearInputValues(clonedCollabField); // Clear input values of the cloned field
    document.getElementById("add-collab-field").appendChild(clonedCollabField); // Append the cloned field
    addedCollabCount++; // Increment the added collaborator count
}

// Function to add mentor fields
function add_mentor(){
    var defaultMentorField = document.getElementById("default-add-mentor-stuff");
    var clonedMentorField = defaultMentorField.cloneNode(true); // Clone the default field
    clearInputValues(clonedMentorField); // Clear input values of the cloned field
    document.getElementById("add-mentor-field").appendChild(clonedMentorField); // Append the cloned field
    addedMentorCount++; // Increment the added mentor count
}

// Function to add link fields
function add_link(){
    var defaultLinkField = document.getElementById("default-add-link-stuff");
    var clonedLinkField = defaultLinkField.cloneNode(true); // Clone the default field
    clearInputValues(clonedLinkField); // Clear input values of the cloned field
    document.getElementById("add-link-field").appendChild(clonedLinkField); // Append the cloned field
    addedLinkCount++; // Increment the added link count
}

// Function to clear input values
function clearInputValues(element) {
    var inputFields = element.querySelectorAll('input[type="text"], textarea');
    inputFields.forEach(function(input) {
        input.value = ''; // Clear input values
    });
}

// Function to remove collaborator field
function remove_collab(){
    if (addedCollabCount > 0) {
        var collabFields = document.querySelectorAll('#add-collab-field .input-group');
        collabFields[addedCollabCount - 1].remove();
        addedCollabCount--; // Decrement the added collaborator count
    }
}

// Function to remove mentor field
function remove_mentor(){
    if (addedMentorCount > 0) {
        var mentorFields = document.querySelectorAll('#add-mentor-field .input-group');
        mentorFields[addedMentorCount - 1].remove();
        addedMentorCount--; // Decrement the added mentor count
    }
}

// Function to remove link field
function remove_link(){
    if (addedLinkCount > 0) {
        var linkFields = document.querySelectorAll('#add-link-field .input-group');
        linkFields[addedLinkCount - 1].remove();
        addedLinkCount--; // Decrement the added link count
    }
}
