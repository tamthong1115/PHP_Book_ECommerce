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
            } else {
              window.location.reload();
            }
          } else {
            const messageDiv = document.getElementById("message");
            messageDiv.textContent = data.message;
            messageDiv.className = `message message-${data.type}`;
            // reload
            window.location.reload();
          }
        })
        .catch((error) => {
          console.log(error);
        });
    });

  document
    .querySelector("#signUpForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = new FormData(this);
      fetch(this.action, {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            showMessage(
              "success",
              data.message ||
                "Tài khoản đăng ký thành công. Vui lòng kiểm tra email."
            );
            modalSignUp.close();
          } else {
            const messageDiv = document.getElementById("message");
            messageDiv.textContent = data.message;
            messageDiv.className = `message message-${data.type}`;
            window.location.reload();
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

document.addEventListener("DOMContentLoaded", function () {
  function validateField(field, errorMessage, condition) {
    const errorElement = field.nextElementSibling;
    if (condition) {
      errorElement.textContent = errorMessage;
      errorElement.style.display = "block";
      field.classList.add("user-invalid");
      field.classList.remove("user-valid");
      return false;
    } else {
      errorElement.style.display = "none";
      field.classList.add("user-valid");
      field.classList.remove("user-invalid");
      return true;
    }
  }

  function validateSignInForm() {
    let isValid = true;

    isValid &= validateField(
      document.getElementById("identifier"),
      "Identifier must be at least 5 characters long",
      document.getElementById("identifier").value.trim().length < 5
    );

    isValid &= validateField(
      document.getElementById("sign-in-password"),
      "Password must be at least 6 characters long",
      document.getElementById("sign-in-password").value.trim().length < 6
    );

    return isValid;
  }

  function validateSignUpForm() {
    let isValid = true;

    isValid &= validateField(
      document.getElementById("username"),
      "Username must be at least 5 characters long",
      document.getElementById("username").value.trim().length < 5
    );

    isValid &= validateField(
      document.getElementById("email"),
      "Invalid email address",
      !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById("email").value)
    );

    isValid &= validateField(
      document.getElementById("password"),
      "Password must be at least 6 characters long",
      document.getElementById("password").value.trim().length < 6
    );

    isValid &= validateField(
      document.getElementById("confirm_password"),
      "Passwords do not match",
      document.getElementById("password").value !==
        document.getElementById("confirm_password").value
    );

    return isValid;
  }

  document
    .getElementById("signInForm")
    .addEventListener("submit", function (event) {
      if (!validateSignInForm()) {
        event.preventDefault();
      }
    });

  document
    .getElementById("signUpForm")
    .addEventListener("submit", function (event) {
      if (!validateSignUpForm()) {
        event.preventDefault();
      }
    });

  document.getElementById("identifier").addEventListener("blur", function () {
    validateField(
      this,
      "Identifier must be at least 5 characters long",
      this.value.trim().length < 5
    );
  });

  document
    .getElementById("sign-in-password")
    .addEventListener("blur", function () {
      validateField(
        this,
        "Password must be at least 6 characters long",
        this.value.trim().length < 6
      );
    });

  document.getElementById("username").addEventListener("blur", function () {
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
            } else {
              window.location.reload();
            }
          } else {
            const messageDiv = document.getElementById("message");
            messageDiv.textContent = data.message;
            messageDiv.className = `message message-${data.type}`;
            // reload
            window.location.reload();
          }
        })
        .catch((error) => {
          console.log(error);
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
});    validateField(
      this,
      "Username must be at least 5 characters long",
      this.value.trim().length < 5
    );
  });

  document.getElementById("email").addEventListener("blur", function () {
    validateField(
      this,
      "Invalid email address",
      !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value)
    );
  });

  document.getElementById("password").addEventListener("blur", function () {
    validateField(
      this,
      "Password must be at least 6 characters long",
      this.value.trim().length < 6
    );
  });

  document
    .getElementById("confirm_password")
    .addEventListener("blur", function () {
      validateField(
        this,
        "Passwords do not match",
        this.value !== document.getElementById("password").value
      );
    });
});
