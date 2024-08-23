class Cart {
  constructor() {
    this.baseUrl = window.location.origin + "/PHP_Book_ECommerce";
    this.checkAllBox = document.getElementById("checkbox-all-product");
    this.checkboxes = document.querySelectorAll(".checkbox-add-cart");
    this.checkAllBox.addEventListener("click", () => {
      this.checkAllProducts();
    });

    this.initializeRemoveButtons();
    this.initializeQuantityButtons();
    this.updateTotalPrice();
    this.checkboxes.forEach((checkbox) => {
      checkbox.addEventListener("change", () => this.updateTotalPrice());
    });
  }

  checkAllProducts() {
    this.checkboxes.forEach((checkbox) => {
      checkbox.checked = this.checkAllBox.checked;
    });
    this.updateTotalPrice();
  }

  initializeRemoveButtons() {
    document.querySelectorAll(".btn-remove-cart a").forEach((button) => {
      button.addEventListener("click", (event) => {
        event.preventDefault();
        const bookCartItemId = button.getAttribute("data-id");
        this.removeCartItem(bookCartItemId);
      });
    });
  }

  initializeQuantityButtons() {
    document
      .querySelectorAll(".product-view-quantity-box-block")
      .forEach((block) => {
        const subtractButton = block.querySelector(".btn-subtract-qty");
        const addButton = block.querySelector(".btn-add-qty");
        const quantityInput = block.querySelector(".qty-carts");
        const bookId = block.getAttribute("data-book-id");

        addButton.addEventListener("click", (event) => {
          event.preventDefault();
          let currentQuantity = parseInt(quantityInput.value, 10);
          this.updateQuantity(bookId, currentQuantity + 1, (success) => {
            if (success) {
              quantityInput.value = currentQuantity + 1;
              location.reload();
            }
          });
        });

        subtractButton.addEventListener("click", (event) => {
          event.preventDefault();
          let currentQuantity = parseInt(quantityInput.value, 10);
          if (currentQuantity > 1) {
            this.updateQuantity(bookId, currentQuantity - 1, (success) => {
              if (success) {
                quantityInput.value = currentQuantity - 1;
                location.reload();
              }
            });
          }
        });
      });
  }

  updateQuantity(bookId, quantity, callback) {
    fetch(this.baseUrl + "/cart/updateQuantity/" + bookId + "/" + quantity, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ quantity: quantity }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // callback(true) will execute the code inside the if block in the updateQuantity method
          callback(true);
        } else {
          alert(data.message);
          callback(false);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("An error occurred");
        callback(false);
      });
  }

  updateTotalPrice() {
    let totalPrice = 0;
    this.checkboxes.forEach((checkbox) => {
      if (checkbox.checked) {
        const cartItem = checkbox.closest(".item-product-cart");
        if (cartItem) {
          const priceElement = cartItem.querySelector(".cartItem-price-total");
          if (priceElement) {
            const priceText = priceElement.textContent.replace(/[^\d.-]/g, "");
            const price = parseFloat(priceText);
            totalPrice += price;
          } else {
            console.error("Price element not found for cart item", cartItem);
          }
        } else {
          console.error("Cart item not found for checkbox", checkbox);
        }
      }
    });
    // loop

    document.getElementById("total-price").textContent =
      totalPrice.toLocaleString() + "đ";
    document.getElementById("total-price-final").textContent =
      totalPrice.toLocaleString() + "đ";
    document.getElementById("hidden-total-price").value = totalPrice;
  }

  removeCartItem(bookCartItemId) {
    fetch(this.baseUrl + "/cart/remove/" + bookCartItemId, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id: bookCartItemId }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          window.location.href = this.baseUrl + "/cart";
          showMessage("success", "Item removed successfully");
        } else {
          showMessage("error", "Failed to remove item");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        showMessage("error", "An error occurred");
      });
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new Cart();
});
