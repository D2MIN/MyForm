console.log("Hello admin");

let chBtn = document.getElementsByClassName("change");
let dlBtn = document.getElementsByClassName("delete");

console.log(chBtn.value);
console.log(dlBtn);

chBtn.onclick = function() {
    console.log("ch");
    window.location.href = 'index.php';
};