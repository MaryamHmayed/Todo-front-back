
const email= document.getElementById('email').value
const password =document.getElementById('password').value
const login = document.getElementById("login")

login.addEventListener("click", () => {

      const data = {
        username: username,
        email: email,
       password: password
      }
    
       fetch("https://127.0.0.1/to-do-backend/Todo-front-back/back-end/login.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'logged in') {
              window.location.href = "../pages/main.html";
            } else {
              console.error('Login failed:', responseData.error);
         
         }
         }
        )})
    