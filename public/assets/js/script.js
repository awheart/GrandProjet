

document.addEventListener('click', event=>{
    let delArts = document.querySelectorAll('#delCheckArt');

    let i = 0;
    delArts.forEach(a => {

        let checked = a.checked;
        let checkboxInput = document.getElementsByClassName("del-box-Art")[i];
        console.log(checkboxInput)
        if (checked) {
            checkboxInput.style.display = "block";
        } else {
            checkboxInput.style.display = "none";
        }
        i++;
    })

})
let checkBox = document.querySelector("#delCheckCom");

document.addEventListener('click', ()=> {
    let checked = checkBox.checked;

    let allDelButtons = document.querySelectorAll(".del-box-Com");
    allDelButtons.forEach(adb => {
        (checked ? adb.style.display = "block"
            : adb.style.display = "none")
    })

})

