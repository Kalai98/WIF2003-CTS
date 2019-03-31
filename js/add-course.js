// Set Global Variable i
var i = 0;

function increment() {
    i += 1; /* Function for automatic increment of field's "Name" attribute. */
}

// Add Subjects
document.getElementById('add-subject').addEventListener('click', function () {
    var subjectArea = document.querySelector('#subject-area');

    var card = document.createElement('div');

    increment();
    card.setAttribute('id', 'del-subject-' + i);
    card.innerHTML = `
            <div class="card mt-3">
                <div class="card-title">
                    <span class="btn btn-light bg-white float-right" onclick="removeElement('subject-area', 'del-subject-` + i +`')"><i class="fas fa-times"></i></span>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Course:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Course Code">
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Course Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Grade:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Grade">
                        </div>
                    </div>
                </div>
            </div>
    `;

    subjectArea.appendChild(card);
});

// Remove Questions
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