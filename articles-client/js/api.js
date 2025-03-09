const archipedia = {};

archipedia.base_api = "http://localhost/articles/articles-server/user/v1/";

archipedia.get_data = async(url) => {
    try {
        const response = await axios.get(url);
        return response.data;
    } catch (error) {
        console.log(error)
    }
}

archipedia.post_data = async (url, data) => {
    try {
        const response = await axios.post(url, data);
        return response.data;
    } catch (error) {
        console.log(error)
    }
}

archipedia.loadFor = (page_name) => {
    eval(`archipedia.load_${page_name}();`);
}


archipedia.load_login = async () => {
    archipedia.login = {};
    archipedia.login.login_api = archipedia.base_api + "login.php";

    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener("submit", async (event) => {
        event.preventDefault();
        const emailVlaue = document.getElementById('email').value;
        const passwordValue = document.getElementById('password').value;

        try {
            const formData = new FormData();
            formData.append('email', emailVlaue);
            formData.append('password', passwordValue);

            const result = await archipedia.post_data(
                archipedia.login.login_api,
                formData,
            );
            console.log(result);
            if(result && result.user) {
                console.log("logged in user is: ", result.user);
                localStorage.setItem('user', JSON.stringify(result.user));
                window.location.href = "home.html";
            }
        } catch (error) {
            console.log(error);
        }
    })
}


archipedia.load_signup = async () => {
    archipedia.signup = {};
    archipedia.signup.signup_api = archipedia.base_api + "register.php";

    const signupForm = document.getElementById('signupForm');

    signupForm.addEventListener("submit", async(event) => {
        event.preventDefault();
        const emailVlaue = document.getElementById("s-email").value;
        const firstNameValue = document.getElementById("first-name").value;
        const lastNameValue = document.getElementById("last-name").value;
        const passwordValue = document.getElementById("s-password").value;



        try {
            const formData = new FormData();
            formData.append('email', emailVlaue);
            formData.append('first_name', firstNameValue);
            formData.append('last_name', lastNameValue);
            formData.append('password', passwordValue);

            const result = await archipedia.post_data(archipedia.signup.signup_api, formData);
            console.log(result);
            if(result && result.user) {
                console.log("signed up user is: ", result.user);
                localStorage.setItem('user', JSON.stringify(result.user));
                window.location.href = "home.html";
            }
        } catch (error) {
            
        }
    })

}

archipedia.load_getQuestions = async () => {
    archipedia.getQuestions = {};
    archipedia.getQuestions.getQuestions_api = archipedia.base_api + "getQuestions.php";

    try {
        const result = await archipedia.get_data(archipedia.getQuestions.getQuestions_api);
        console.log(result);

        if(result && result.questions) {
            const questionsContainer = document.getElementById('questions-container');

            questionsContainer.innerHTML = '';

            result.questions.forEach(question => {
                const questionCard =
                 `<div class="question-card">
                    <div class="question-part">
                        <h3 class="question">${question.question_text} </h3>
                    </div>
                    <hr>
                    <div class="answer-part">
                        <p class="answer">${question.answer}</p>
                    </div>
                </div>`;
                questionsContainer.innerHTML += questionCard;
            });
        }

    } catch (error) {
        console.log(error);
    }
}


archipedia.load_addQuestion = async () => {
    archipedia.addQuestion = {};
    archipedia.addQuestion.addQuestion_api = archipedia.base_api + "insertQuestion.php";



    const questionForm = document.getElementById("question-form");

    questionForm.addEventListener("submit", async(event) => {
        event.preventDefault();

        const questionText = document.getElementById('question-text').value;
        const answer = document.getElementById('answer').value;

        try {
            const storedUser = localStorage.getItem('user'); 
            let user = {}; 
            if (storedUser) {
                user = JSON.parse(storedUser); 
                console.log("User ID:", user.id); 
            } else {
                console.log("No user found in local storage.");
                return; 
            }
            const formData = new FormData();
            formData.append("question_text", questionText);
            formData.append("answer", answer);
            formData.append("user_id", user.id);

            

            const result = await archipedia.post_data(archipedia.addQuestion.addQuestion_api, formData);
            console.log(result);

            if(result && result.message) {
                console.log("this is the message fromm the result", result);
            }
        } catch (error) {
            console.log(error);
        }

    });
}

function logout() {
    localStorage.removeItem('user'); 
    window.location.href = "index.html";
}