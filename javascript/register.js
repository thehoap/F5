const type = document.getElementById("type");
const stagename = document.getElementById("stagename");
function checkedToAble() {
    if (type.checked == true) {
        stagename.disabled = false;
    } else {
        stagename.disabled = true;
        stagename.value = "";
    }
}

const image = document.getElementById("image");
const avatar = document.querySelector(".avatar");
image.onchange = (evt) => {
    const [file] = image.files;
    if (file) {
        avatar.style.display = "block";
        avatar.src = URL.createObjectURL(file);
    }
};

