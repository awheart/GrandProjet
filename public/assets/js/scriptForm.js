let mail = document.querySelector(".mail")
let form = document.querySelector('form')
let modal = document.getElementsByClassName("modal")[0];

form.addEventListener('submit', (e) => {

    let mailValue = mail.value
    let mailLength = mailValue.length

    if(mailLength === 0)
    {
        let divError = mail.parentElement.children[2]
        if (divError.children.length === 1) divError.children[0].remove();

        let p = document.createElement("p")
        p.textContent = "Veuillez renseigner votre adresse mail pour vous abonnez à la newsletter"
        divError.appendChild(p)
        e.preventDefault()
    }else {
        modal.style.display = "block";
    }
})
modal.addEventListener('click', event=> {
    modal.style.display = "none";
})
