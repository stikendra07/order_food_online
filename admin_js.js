let btn = document.querySelector("button");
let div = document.querySelector("add-menu");
btn.addEventListener("click", () => {
  if (div.style.display === "none") {
    div.style.display = "block";
  } else {
    div.style.display = "none";
  }
});
