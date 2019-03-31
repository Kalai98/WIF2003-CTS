// Set Global Variable i
var i = 0;

function increment() {
    i += 1; /* Function for automatic increment of field's "Name" attribute. */
}

// Add Student
document.getElementById('add-question').addEventListener('click', function () {
    var questionArea = document.querySelector('#question-area');

    var card = document.createElement('div');

    increment();
    card.setAttribute('id', 'del-question-' + i);
    card.innerHTML = `
    <div class="card bg-light mt-2">
        <div class="card-header">
            <span class="h4">Student ` + i + `</span>
            <p class="float-right btn btn-outline-dark btn-sm" onclick="removeElement('question-area', 'del-question-` + i +`')" ><span class=""><i class="fas fa-times"></i></span></p>
        </div>

        <div class="card-body">
            <div class="form-group">
                <h6 class="card-title">Student Id</h6>
                <input type="text" name="answer" class="form-control" placeholder="Matric. No.">
            </div>
            <div class="form-group">
                <h6 class="card-title">First Name</h6>
                <input type="text" name="question" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
                <h6 class="card-title">Last Name</h6>
                <input type="text" name="question" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group">
                <h6 class="card-title">Major</h6>
                <select name="type" class="form-control">
                    <option selected disabled>Choose Major</option>
                    <option value="dropdown">Artificial Intelligence</option>
                    <option value="radio">Computer System and Network</option>
                    <option value="text">Information Systems</option>
                    <option value="textarea">Software Engineering</option>
                    <option value="checkbox">Multimedia</option>
                </select>
            </div>
        </div>
    </div>`;

    questionArea.appendChild(card);
});

// Remove Student
function removeElement(parentDiv, childDiv) {
    if (childDiv == parentDiv) {
        alert("The parent div cannot be removed.");
    } else if (document.getElementById(childDiv)) {
        var child = document.getElementById(childDiv);
        var parent = document.getElementById(parentDiv);
        parent.removeChild(child);
    } else {
        alert("Child div has already been removed or does not exist.");
        return false;
    }
}