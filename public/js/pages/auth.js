const modalSignIn = document.querySelector("#modal-signIn");
const openModalSignIn = document.querySelectorAll(".open-modal-signIn");

const modalSignUp = document.querySelector("#modal-signUp");
const openModalSignUp = document.querySelectorAll(".open-modal-signUp");

const authContainer = document.querySelector(".auth-container");

openModalSignIn.forEach((element) => {
  element.addEventListener("click", () => {
    modalSignUp.close();
    modalSignIn.showModal();
  });
});

openModalSignUp.forEach((element) => {
  element.addEventListener("click", () => {
    modalSignIn.close();
    modalSignUp.showModal();
  });
});

modalSignIn.addEventListener("click", (e) => {
  if (e.target === modalSignIn) {
    modalSignIn.close();
  }
});

modalSignUp.addEventListener("click", (e) => {
  if (e.target === modalSignUp) {
    modalSignUp.close();
  }
});

authContainer.addEventListener("click", (e) => e.stopPropagation());

document.addEventListener("DOMContentLoaded", function () {
  const accountContainer = document.querySelector(".header_account_container");
  const accountDropdown = document.getElementById("accountDropdown");

  accountContainer.addEventListener("mouseover", function () {
    accountDropdown.style.display = "block";
  });

  accountContainer.addEventListener("mouseout", function () {
    accountDropdown.style.display = "none";
  });

  accountDropdown.addEventListener("mouseover", function () {
    accountDropdown.style.display = "block";
  });

  accountDropdown.addEventListener("mouseout", function () {
    accountDropdown.style.display = "none";
  });
});
