function showHideKey() {
    let keyInput = document.getElementById("key");
    if (keyInput.type === "password") {
      keyInput.type = "text";
    } else {
      keyInput.type = "password";
    }
  }