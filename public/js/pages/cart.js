class Cart {
  constructor() {
    this.baseUrl = window.location.origin + "/PHP_Book_ECommerce";
    this.totalPrice = 0;
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

    this.initializeCheckoutButton();
  }

  checkAllProducts() {
    this.checkboxes.forEach((checkbox) => {
      checkbox.checked = this.checkAllBox.checked;
    });
    this.updateTotalPrice();
  }

  initializeCheckoutButton() {
    const checkoutButton = document.querySelector(".checkout-button");
    checkoutButton.addEventListener("click", (event) => {
      event.preventDefault();
      const selectedItems = this.getSelectedItems();
      if (selectedItems.length === 0) {
        showMessage(
          "error",
          "Vui lòng chọn ít nhất một sản phẩm để thanh toán."
        );
        return;
      }

      const totalPrice = this.totalPrice;
      //<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
      const csrfToken = document.querySelector(
        'input[name="csrf_token"]'
      ).value;

      const formData = {
        cartItems: selectedItems,
        totalAmount: totalPrice,
        csrfToken: csrfToken,
      };

      fetch(this.baseUrl + "/payment/checkout", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            window.location.href = data.returnUrl; // Redirect to Stripe payment page

            showMessage("success", data.message || "Payment successful");
          } else {
            showMessage(
              "error",
              data.message || "Có lỗi xảy ra trong quá trình thanh toán."
            );
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          showMessage("error", "An error occurred during payment.");
        });
    });
  }

  getSelectedItems() {
    const selectedItems = [];
    this.checkboxes.forEach((checkbox) => {
      if (checkbox.checked) {
        const cartItem = checkbox.closest(".item-product-cart");
        if (cartItem) {
          const bookId = checkbox.value;
          const quantityInput = cartItem.querySelector(".qty-carts");
          const quantity = parseInt(quantityInput.value, 10);
          const priceItem = cartItem.querySelector(".price");
          const price = parseFloat(
            priceItem.textContent.replace(/[^\d.-]/g, "")
          );
          selectedItems.push({ bookId, quantity, price });
        }
      }
    });
    return selectedItems;
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
    this.totalPrice = 0;

    this.checkboxes.forEach((checkbox) => {
      if (checkbox.checked) {
        const cartItem = checkbox.closest(".item-product-cart");
        if (cartItem) {
          const priceElement = cartItem.querySelector(".cartItem-price-total");
          if (priceElement) {
            const priceText = priceElement.textContent.replace(/[^\d.-]/g, "");
            const price = parseFloat(priceText);
            this.totalPrice += price;
          } else {
            console.error("Price element not found for cart item", cartItem);
          }
        } else {
          console.error("Cart item not found for checkbox", checkbox);
        }
      }
    });

    document.getElementById("total-price").textContent =
      this.totalPrice.toLocaleString() + "đ";
    document.getElementById("total-price-final").textContent =
      this.totalPrice.toLocaleString() + "đ";
    document.getElementById("hidden-total-price").value = this.totalPrice;
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
