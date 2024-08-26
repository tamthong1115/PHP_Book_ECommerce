function showMessage(type, message) {
  const prompt = document.createElement("div");
  prompt.className = `prompt prompt-${type}`;
  prompt.textContent = message;

  document.body.appendChild(prompt);

  // Store the message in localStorage
  localStorage.setItem("messageType", type);
  localStorage.setItem("messageContent", message);

  setTimeout(() => {
    prompt.classList.add("fade-out");
    setTimeout(() => {
      document.body.removeChild(prompt);
      // Remove the message from localStorage after it fades out
      localStorage.removeItem("messageType");
      localStorage.removeItem("messageContent");
    }, 1000);
  }, 4000);
}

// Check for any stored messages when the page loads
window.addEventListener("load", () => {
  const storedType = localStorage.getItem("messageType");
  const storedMessage = localStorage.getItem("messageContent");

  if (storedType && storedMessage) {
    // Show the stored message
    showMessage(storedType, storedMessage);
  }
});
