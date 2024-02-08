<script>
    const catBTN = document.getElementById("category-btn");
    const catBTNIcon = document.getElementById("category-btn-icon");
    const categoryDropDown = document.getElementById("category-dropdown");

    function openfn() {
        catBTN.dataset.state = "open";
        catBTNIcon.classList.add("rotate-[135deg]", "translate-y-1")
        catBTNIcon.classList.remove("-rotate-[45deg]", "-translate-x-0.5")
        categoryDropDown.classList.add("flex");
        categoryDropDown.classList.remove("hidden");
    }

    function closefn() {
        catBTN.dataset.state = "closed";
        catBTNIcon.classList.remove("rotate-[135deg]", "translate-y-1")
        catBTNIcon.classList.add("-rotate-[45deg]", "-translate-x-0.5")
        categoryDropDown.classList.remove("flex");
        categoryDropDown.classList.add("hidden");
    }

    catBTN.addEventListener("click", function() {
        if (this.dataset.state === "closed") {
            openfn()
        } else {
            closefn()
        }
    })

    document.addEventListener("click", function(e) {
        if (catBTN.dataset.state === "open" && !catBTN.contains(e.target)) {
            closefn()
        }
    })
</script>
