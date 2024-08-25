var citis = document.getElementById("update_province");
var districts = document.getElementById("update_district");
var wards = document.getElementById("update_ward");

const cityInput = document.getElementById("input_update_province");
const districtInput = document.getElementById("input_update_district");
const wardInput = document.getElementById("input_update_ward");

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
