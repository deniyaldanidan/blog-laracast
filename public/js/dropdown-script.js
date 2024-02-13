const catBTNs = document.getElementsByClassName("my-cust-dropdown");

for (let catBTN of catBTNs) {
    let catBTNIcon = catBTN.getElementsByClassName("my-cust-dropdown-icon")[0];
    let categoryDropDown = catBTN.getElementsByClassName("my-cust-dropdown-contents")[0];

    catBTN.addEventListener("click", function () {
        if (catBTN.dataset.state === "closed") {
            catBTN.dataset.state = "open";
            catBTNIcon.classList.add("rotate-[135deg]", "translate-y-1")
            catBTNIcon.classList.remove("-rotate-[45deg]", "-translate-x-0.5")
            categoryDropDown.classList.add("flex");
            categoryDropDown.classList.remove("hidden");
        } else {
            catBTN.dataset.state = "closed";
            catBTNIcon.classList.remove("rotate-[135deg]", "translate-y-1")
            catBTNIcon.classList.add("-rotate-[45deg]", "-translate-x-0.5")
            categoryDropDown.classList.remove("flex");
            categoryDropDown.classList.add("hidden");
        }
    })
}
