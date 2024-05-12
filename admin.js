console.log("Hello admin");

let chBtn = document.getElementsByClassName("change")[0];
let dlBtn = document.getElementsByClassName("delete")[0];

chBtn.onclick = function() {
    console.log("ch");
    window.location.href = 'index.php';
};