const loginForm = document.getElementById("login-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("login-error-msg");

loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    const username = loginForm.username.value;
    const password = loginForm.password.value;

    if (username === "Admin" && password === "admin") {
        var inBody = function(){            // Создаём анонимную функцию. Помещаем её в переменную "inBody"
            var xhr = new XMLHttpRequest()  // Создаём локальную переменную XHR, которая будет объектом XMLHttpRequest
            xhr.open('GET', 'managment2.html')     // Задаём метод запроса и URL  запроса
            xhr.onload = function(){        // Используем обработчик событий onload, чтобы поймать ответ сервера XMLHttpRequest
               console.log(xhr.response)           // Выводим в консоль содержимое ответа сервера. Это строка!
               document.body.innerHTML = xhr.response  // Содержимое ответа, помещаем внутрь элемент "body" 
            }
            xhr.send()  // Инициирует запрос. Посылаем запрос на сервер.
         }
         inBody()  
    } else {
        loginErrorMsg.style.opacity = 1;
    }

    if (username === "Student" && password === "parol") {
        var inBody = function(){            // Создаём анонимную функцию. Помещаем её в переменную "inBody"
            var xhr = new XMLHttpRequest()  // Создаём локальную переменную XHR, которая будет объектом XMLHttpRequest
            xhr.open('GET', 'personal_office_student.html')     // Задаём метод запроса и URL  запроса
            xhr.onload = function(){        // Используем обработчик событий onload, чтобы поймать ответ сервера XMLHttpRequest
               console.log(xhr.response)           // Выводим в консоль содержимое ответа сервера. Это строка!
               document.body.innerHTML = xhr.response  // Содержимое ответа, помещаем внутрь элемент "body" 
            }
            xhr.send()  // Инициирует запрос. Посылаем запрос на сервер.
         }
         inBody()  
    } else {
        loginErrorMsg.style.opacity = 1;
    }

    if (username === "Tutor" && password === "parol") {
        var inBody = function(){            // Создаём анонимную функцию. Помещаем её в переменную "inBody"
            var xhr = new XMLHttpRequest()  // Создаём локальную переменную XHR, которая будет объектом XMLHttpRequest
            xhr.open('GET', 'personal_office_tutor.html')     // Задаём метод запроса и URL  запроса
            xhr.onload = function(){        // Используем обработчик событий onload, чтобы поймать ответ сервера XMLHttpRequest
               console.log(xhr.response)           // Выводим в консоль содержимое ответа сервера. Это строка!
               document.body.innerHTML = xhr.response  // Содержимое ответа, помещаем внутрь элемент "body" 
            }
            xhr.send()  // Инициирует запрос. Посылаем запрос на сервер.
         }
         inBody()  
    } else {
        loginErrorMsg.style.opacity = 1;
    }
    
})