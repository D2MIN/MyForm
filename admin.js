console.log("Hello admin");

let chBtn = document.getElementById("change");
let dlBtn = document.getElementById("delete");

let id = document.getElementById("id");
console.log(id);

chBtn.onclick = function() {
    window.location.href = 'adminChange.php?id='+id;
};

dlBtn.onclick = function() {
    window.location.href = 'adminDelete.php?id='+id;
};