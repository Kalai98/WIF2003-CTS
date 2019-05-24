var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 2)) {
        document.getElementById("nextBtn").innerHTML = "Confirm";
    } else if (n == (x.length - 1)) {
        document.getElementById('navbar').style.display = "none";
        document.getElementById("nextBtn").innerHTML = "Submit";
        document.getElementById("prevBtn").style.display = "none";
        showAllAns();
    } else {
        document.getElementById('navbar').style.display = "inline";
        document.getElementById("nextBtn").innerHTML = "Next";
    }

}

function goTo(page) {
    var x = document.getElementsByClassName("tab");
    x[currentTab].style.display = "none";
    currentTab = page;
    checkIfLastPage(currentTab);
    showTab(currentTab);
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    checkIfLastPage(currentTab);
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function checkIfLastPage(current) {
    if (current >= document.getElementsByClassName("tab").length) {
        // ... the form gets submitted:
        getEndTime();
        document.getElementById("regForm").submit();
        localStorage.clear();
    }
}


//-------------------------------------------------Timer------------------------------------------------//
// Set the date we're counting down to
var countDownDate = new Date().getTime() + (3600 * 1000);
localStorage.setItem('Start Time', getCurrentTime());

// Update the count down every 1 second
var x = setInterval(function () {
    // console.log(distance)
    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var duration = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((duration % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
    // If the count down is finished, write some text 
    if (duration < 0) {
        getEndTime();
        document.getElementById("regForm").submit();
    }
}, 1000);

function getEndTime() {

    localStorage.setItem('Stop Time', getCurrentTime());
    var endTime = new Date().getTime() + (3600 * 1000);
    duration = endTime - countDownDate;
    var minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((duration % (1000 * 60)) / 1000);
    var dur = minutes + ' mins ' + seconds + ' secs';
    localStorage.setItem('Duration', dur);

    // Get info from localStorage to HTML input
    var durHTML = document.getElementById('dur');
    durHTML.value = dur;

    var startHTML = document.getElementById('startTime');
    startHTML.value = localStorage.getItem('Start Time');

    var stopHTML = document.getElementById('stopTime');
    stopHTML.value = localStorage.getItem('Stop Time');

    // localStorage.clear();
}

function getCurrentTime() {
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    var d = new Date();

    var ampm = d.getHours() > 12 ? 'PM' : 'AM';
    var belowTen = d.getMinutes() < 10 ? '0' + d.getMinutes() : d.getMinutes();
    var now = convertTo12(d.getHours()) + ':' + belowTen + ' ' + ampm + ' (' + days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear() + ')';
    return now;
}

function convertTo12(time) {
    return time > 12 ? time - 12 : time;
}

var storageLength = 15;
// LocalStorage Init
for (var i = 0; i < storageLength; i++) {

}

//-------------------------------------------------LocalStorage------------------------------------------------//

function saveToLocalStorage(id) {

    if (document.getElementsByClassName(id).name == 'radio') {
        var radios = document.getElementsByClassName(id);
        console.log(radios);
        for (i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                localStorage.setItem(id, radios.value);
            }
        }
    } else {
        var val = document.getElementById(id).value;
        val == null ? localStorage.setItem(id, ' ') : localStorage.setItem(id, val);
    }

    if (id == 'a31' || id == 'a32') {
        var isAnswered = localStorage.getItem('a31') && localStorage.getItem('a32');
        if (isAnswered) {
            localStorage.setItem('a3', true);
        } else {
            localStorage.setItem('a3', false);
        }
    }
    if (id == 'a91' || id == 'a92') {
        var isAnswered = localStorage.getItem('a91') && localStorage.getItem('a92');
        if (isAnswered) {
            localStorage.setItem('a9', true);
        } else {
            localStorage.setItem('a9', false);
        }
    }
    if (id == 'a81' || id == 'a82' || id == 'a83' || id == 'a84') {
        isRadioAnswered();
    }

}

function radioToLocalStorage(className) {
    var elem = document.getElementsByClassName(className);

    if (elem[0].checked == true) {
        localStorage.setItem(className, elem[0].value);
    } else {
        localStorage.setItem(className, elem[1].value);
    }

    isRadioAnswered();
}

function isRadioAnswered() {
    var isAnswered = localStorage.getItem('a81') && localStorage.getItem('a82') && localStorage.getItem('a83') && localStorage.getItem('a84') && localStorage.getItem('a85');
    if (isAnswered) {
        localStorage.setItem('a8', true);
    } else {
        localStorage.setItem('a8', false);
    }
}

function showAllAns() {

    for (var i = 1; i < storageLength; i++) {
        var id = 'a' + i;
        if (i == 3) {
            if (localStorage.getItem('a3') == 'true') {
                document.getElementById(id + '1a').innerHTML = localStorage.getItem(id + '1');
                document.getElementById(id + '2a').innerHTML = localStorage.getItem(id + '2');
            }
            checkAnswered(id);
        } else if (i == 8) {
            if (localStorage.getItem('a8') == 'true') {
                document.getElementById(id + '1a').innerHTML = localStorage.getItem(id + '1');
                document.getElementById(id + '2a').innerHTML = localStorage.getItem(id + '2');
                document.getElementById(id + '3a').innerHTML = localStorage.getItem(id + '3');
                document.getElementById(id + '4a').innerHTML = localStorage.getItem(id + '4');
                document.getElementById(id + '5a').innerHTML = localStorage.getItem(id + '5');
            }
            checkAnswered(id);
        } else if (i == 9) {
            if (localStorage.getItem('a9') == 'true') {
                document.getElementById(id + '1a').innerHTML = localStorage.getItem(id + '1');
                document.getElementById(id + '2a').innerHTML = localStorage.getItem(id + '2');
            }
            checkAnswered(id);
        }
        else {
            document.getElementById(id + 'a').innerHTML = localStorage.getItem(id);
            checkAnswered(id);
        }
    }

}

function checkAnswered(id) {
    if (localStorage.getItem(id) == '' || localStorage.getItem(id) == null) {
        document.getElementById(id + 'b').innerHTML = 'Not Answered';
        document.getElementById(id + 'b').parentElement.classList.add('table-danger');
    } else {
        document.getElementById(id + 'b').innerHTML = 'Answered';
        document.getElementById(id + 'b').parentElement.classList.remove('table-danger');
    }
}

function showAns(id) {
    if (document.getElementById(id).type == 'radio') {
        var radio = document.getElementById(id);
        var isRadio = localStorage.getItem(id);
        isRadio === 'true' ? radio.checked = true : radio.checked = false;
    } else {
        var input = document.getElementById(id);
        var val = localStorage.getItem(id);
        input.value = val;
    }
}