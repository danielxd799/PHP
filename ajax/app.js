let lastTime = 0;

function fetchMessages() {
  const name = document.getElementById('name').value;
  const room = document.getElementById('room').value;

  fetch(`server.php?name=${name}&room=${room}&timeskip=${lastTime}`)
    .then(res => res.json())
    .then(data => {
      const chat = document.getElementById('chat');
      data.messages.forEach(msg => {
        chat.innerHTML += `<div><b>${msg.name}</b>: ${msg.text}</div>`;
        lastTime = msg.time;
      });
      chat.scrollTop = chat.scrollHeight;
    });
}

function sendMessage() {
  const name = document.getElementById('name').value;
  const room = document.getElementById('room').value;
  const message = document.getElementById('message').value;

  fetch('server.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ name, room, timeskip: Date.now(), message })
  });

  document.getElementById('message').value = '';
  
  
}

document.addEventListener('DOMContentLoaded', () => {
    const messageInput = document.getElementById('message');
  
    messageInput.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        e.preventDefault(); 
        sendMessage();
      }
    });
  });


setInterval(fetchMessages, 1000);
