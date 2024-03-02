
function sendEmail() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const number = document.getElementById("number").value.trim();
    const message = document.getElementById("message").value.trim();

    if (!name || !email || !number || !message) {
        alert("Preencha os campos todos e volte a tentar");
        return false;
    }

    emailjs.send("service_r8ppm15", "template_3y9aokn", {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        random: document.getElementById("number").value,
        message: document.getElementById("message").value,
    })
    .then(
      function(response) {
        console.log("SUCCESS", response);
        alert("Email envia com sucesso");
      },
      function(error) {
        console.log("FAILED", error);
        alert("Erro a enviar|Tente de novo mais tarde");
      }
    );
    return false;
  }

  const sendButton = document.getElementById('enviar');
  const nome = document.getElementById('name');
  const email = document.getElementById('email');
  const numero = document.getElementById('number');
  const mensagem = document.getElementById('message');
  

  sendButton.addEventListener('click', function() {
    nome.value = '';
    email.value = '';
    numero.value = '';
    mensagem.value = '';
  });

