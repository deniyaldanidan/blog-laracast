const myToasts = document.getElementsByClassName("toast");

setTimeout(() => {
    for (const toast of myToasts) {
        toast.classList.remove("flex");
        toast.classList.add("hidden");
    }
}, 5000)