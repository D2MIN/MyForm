console.log("Hello admin");

let chBtn = document.getElementById("change");
let dlBtn = document.getElementById("delete");

chBtn.onclick = function() {
    console.log("ch");
    window.location.href = 'index.php';
};

dlBtn.onclick = function() {
    console.log("dl");
    window.location.href = 'index.php';
};