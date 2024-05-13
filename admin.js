console.log("Hello admin");

let chBtn = document.getElementById("change");
let dlBtn = document.getElementById("delete");
let exit = document.getElementById("exit");

let id = document.getElementById("id");

chBtn.onclick = function() {
    window.location.href = 'adminChange.php?id='+id.value;
};

dlBtn.onclick = function() {
    window.location.href = 'adminDelete.php?id='+id.value;
};

exit.onclick = function(){
    xhr.setRequestHeader('Authorization', '');
}