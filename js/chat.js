const form = document.querySelector(".message-input"),
  selectedId = form.querySelector(".message-input .selected-id").value,
  inputField = form.querySelector(".message-input .message-text"),
  sendButton = form.querySelector(".message-input button"),
  chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault();
};

inputField.focus();
inputField.onkeyup = () => {
  if (inputField.value != "") {
    sendButton.classList.add("active");
  } else {
    sendButton.classList.remove("active");
  }
};

sendButton.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/send_msg.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = "";
        scrollToBottom();
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};

chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
};

chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get_msg.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("selected_id=" + selectedId);
}, 1000);

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
