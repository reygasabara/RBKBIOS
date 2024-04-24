const button = document.getElementById("viewError");
const container = document.getElementById("errorContainerBox");
const close = document.getElementById("close");

button.addEventListener("click", function () {
    container.style.display = "flex";
});

const closeButton = () => {
    if (
        event.target.id === "errorContainerBox" ||
        event.target.id === "close"
    ) {
        container.style.display = "none";
    }
};
