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
  const base_url = window.location.origin + "/PHP_Book_ECommerce";
  document.getElementById("redirectUrl").value = window.location.href;

  document
    .querySelector("#signInForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = new FormData(this);
      fetch(this.action, {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.type === "success") {
            showMessage(data.type, data.message);
            modalSignIn.close();
            if (data.isAdmin) {
              window.location.href = base_url + "/admin";
            }
          } else {
            const messageDiv = document.getElementById("message");
            messageDiv.textContent = data.message;
            messageDiv.className = `message message-${data.type}`;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    });

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
