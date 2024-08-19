class Cart {
  constructor() {
    this.checkAllBox = document.getElementById("checkbox-all-product");
    this.checkboxes = document.querySelectorAll(".checkbox-add-cart");
    this.checkAllBox.addEventListener("click", () => this.checkAllProducts());
  }

  checkAllProducts() {
    this.checkboxes.forEach((checkbox) => {
      checkbox.checked = this.checkAllBox.checked;
    });
  }
}

// Initialize the Cart class when the DOM is fully loaded
document.addEventListener("DOMContentLoaded", () => {
  new Cart();
});
