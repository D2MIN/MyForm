console.log("Hello admin");

let chBtn = document.getElementById("change");
let dlBtn = document.getElementById("delete");

chBtn.onclick = function() {
    window.location.href = 'index.php';
    console.log("ch");
};