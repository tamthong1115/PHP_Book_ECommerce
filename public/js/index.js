function showMessage(type, message) {
  const prompt = document.createElement("div");
  prompt.className = `prompt prompt-${type}`;

  const closeButton = document.createElement("button");
  closeButton.className = "prompt-close";
  closeButton.innerHTML = "&times;";
  closeButton.onclick = () => {
    document.body.removeChild(prompt);
    localStorage.removeItem("messageType");
    localStorage.removeItem("messageContent");
  };

  const messageContent = document.createElement("span");
  messageContent.textContent = message;

  prompt.appendChild(messageContent);
  prompt.appendChild(closeButton);
  document.body.appendChild(prompt);

  // Store the message in localStorage
  localStorage.setItem("messageType", type);
  localStorage.setItem("messageContent", message);

  setTimeout(() => {
    prompt.classList.add("fade-out");
    setTimeout(() => {
      if (document.body.contains(prompt)) {
        document.body.removeChild(prompt);
        // Remove the message from localStorage after it fades out
        localStorage.removeItem("messageType");
        localStorage.removeItem("messageContent");
      }
    }, 1000);
  }, 4000);
}
