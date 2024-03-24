function add_collab(){
    // var student_name  = document.getElementById("collab-name").value;
    // var role  = document.getElementById("collab-role").value;

    // console.log(student_name,role);

    var to_be_added_html_student = document.getElementById("default-add-collab-stuff").innerHTML;
    var already_existing_html_student = document.getElementById("add-collab-field").innerHTML;
    
    new_html_for_collab=already_existing_html_student+to_be_added_html_student;
    document.getElementById("add-collab-field").innerHTML = new_html_for_collab;
    // console.log(new_html_for_collab);
}
function add_mentor(){
    // var mentor_name  = document.getElementById("mentor-student_name").value;
    // var role  = document.getElementById("collab-role").value;

    // console.log(mentor_name_name);

    var to_be_added_html_mentor = document.getElementById("default-add-mentor-stuff").innerHTML;
    var already_existing_html_mentor = document.getElementById("add-mentor-field").innerHTML;
    
    new_html_for_mentor=already_existing_html_mentor+to_be_added_html_mentor;
    document.getElementById("add-mentor-field").innerHTML = new_html_for_mentor;

}
function add_link(){
   
    var to_be_added_html_link = document.getElementById("default-add-link-stuff").innerHTML;
    var already_existing_html_link = document.getElementById("add-link-field").innerHTML;
    
    new_html_for_link=already_existing_html_link+to_be_added_html_link;
    document.getElementById("add-link-field").innerHTML = new_html_for_link;

}