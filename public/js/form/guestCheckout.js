document.addEventListener("DOMContentLoaded", function () {
  var citis = document.getElementById("guest_province");
  var districts = document.getElementById("guest_district");
  var wards = document.getElementById("guest_ward");

  const cityInput = document.getElementById("input_guest_province");
  const districtInput = document.getElementById("input_guest_district");
  const wardInput = document.getElementById("input_guest_ward");

  const url =
    window.location.origin + "/PHP_Book_ECommerce/public/data/diachi.json";
  fetch(url)
    .then((response) => response.json())
    .then((data) => renderCity(data))
    .catch((error) => console.error("Error fetching data:", error));

  function renderCity(data) {
    for (const x of data) {
      citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }
    citis.onchange = function () {
      districts.length = 1;
      wards.length = 1;
      if (this.value != "") {
        const selectedCity = data.find((city) => city.Id === this.value);
        cityInput.value = selectedCity.Name;
        for (const district of selectedCity.Districts) {
          districts.options[districts.options.length] = new Option(
            district.Name,
            district.Id
          );
        }
      }
    };
    districts.onchange = function () {
      wards.length = 1;
      if (this.value != "") {
        const selectedCity = data.find((city) => city.Id === citis.value);
        const selectedDistrict = selectedCity.Districts.find(
          (district) => district.Id === this.value
        );
        districtInput.value = selectedDistrict.Name;
        for (const ward of selectedDistrict.Wards) {
          wards.options[wards.options.length] = new Option(ward.Name, ward.Id);
        }
      }
    };
    wards.onchange = function () {
      if (this.value != "") {
        const selectedCity = data.find((city) => city.Id === citis.value);
        const selectedDistrict = selectedCity.Districts.find(
          (district) => district.Id === districts.value
        );
        const selectedWard = selectedDistrict.Wards.find(
          (ward) => ward.Id === this.value
        );
        wardInput.value = selectedWard.Name;
      }
    };
  }

  function validateField(field, errorMessage, condition) {
    const errorDiv = document.getElementById(`${field.id}Error`);
    if (condition) {
      errorDiv.textContent = errorMessage;
      errorDiv.style.display = "block";
      return false;
    } else {
      errorDiv.textContent = "";
      errorDiv.style.display = "none";
      return true;
    }
  }

  function validateForm() {
    let isValid = true;

    isValid &= validateField(
      document.getElementById("guest_name"),
      "Name is required",
      document.getElementById("guest_name").value.trim() === ""
    );

    isValid &= validateField(
      document.getElementById("guest_email"),
      "Invalid email address",
      !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(
        document.getElementById("guest_email").value
      )
    );

    isValid &= validateField(
      document.getElementById("guest_phone_number"),
      "Invalid phone number",
      !/^\d{10}$/.test(document.getElementById("guest_phone_number").value)
    );

    isValid &= validateField(
      document.getElementById("guest_address_line_1"),
      "Address Line 1 is required",
      document.getElementById("guest_address_line_1").value.trim() === ""
    );

    isValid &= validateField(
      document.getElementById("input_guest_province"),
      "Province is required",
      document.getElementById("input_guest_province").value.trim() === ""
    );

    isValid &= validateField(
      document.getElementById("input_guest_district"),
      "District is required",
      document.getElementById("input_guest_district").value.trim() === ""
    );

    isValid &= validateField(
      document.getElementById("input_guest_ward"),
      "Ward is required",
      document.getElementById("input_guest_ward").value.trim() === ""
    );

    return isValid;
  }

  document
    .querySelector(".guest-order-form")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      if (validateForm()) {
        const guestData = {
          name: document.getElementById("guest_name").value,
          email: document.getElementById("guest_email").value,
          phone: document.getElementById("guest_phone_number").value,
          address1: document.getElementById("guest_address_line_1").value,
          address2: document.getElementById("guest_address_line_2").value,
          province: document.getElementById("input_guest_province").value,
          district: document.getElementById("input_guest_district").value,
          ward: document.getElementById("input_guest_ward").value,
          cartItems: JSON.parse(localStorage.getItem("cartItems")),
          totalAmount: localStorage.getItem("totalAmount"),
        };
        const baseUrl = window.location.origin + "/PHP_Book_ECommerce";

        fetch(baseUrl + "/payment/checkout", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(guestData),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              window.location.href = data.returnUrl;
            } else {
              alert(data.message || "An error occurred during payment.");
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            alert("An error occurred during payment.");
          });
      }
    });

  document.getElementById("guest_email").addEventListener("blur", function () {
    validateField(
      this,
      "Invalid email address",
      !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value)
    );
  });

  document
    .getElementById("guest_phone_number")
    .addEventListener("blur", function () {
      validateField(this, "Invalid phone number", !/^\d{10}$/.test(this.value));
    });
});
