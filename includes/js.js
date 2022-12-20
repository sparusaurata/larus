// This is an internal file, do not modify unless you know
// what you are doing!

// Show or hides the abstract of a publication, given by its $id.
function resume(id) {
    var e = document.getElementById("resume-" + id);
    if ( e.style.display === "none" ) {
        e.style.display = "block";
    } else {
        e.style.display = "none";
    }
}