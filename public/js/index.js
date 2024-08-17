function showMessage(type, message) {
  const prompt = document.createElement("div");
  prompt.className = `prompt prompt-${type}`;
  prompt.textContent = message;

  document.body.appendChild(prompt);

  setTimeout(() => {
    prompt.classList.add("fade-out");
    setTimeout(() => {
      document.body.removeChild(prompt);
    }, 1000);
  }, 4000);
}
