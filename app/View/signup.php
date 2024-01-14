<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wikipedia</title>
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Wikipedia">
    <meta name="description" content="Wikipedia ">
    <link rel="stylesheet" href="<?= URL_DIR ?>public/assets/dist/output.css">

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <style>
        .error-message {
            color: red;
        }
    </style>

</head>


<body class="dark:bg-gray-900 text-gray-600">

    <div class="min-h-screen  text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div class="mt-12 flex flex-col items-center">
                    <div class="w-full flex-1 mt-8">
                        <div class="flex flex-col items-center"></div>

                        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                                <div class="flex items-center justify-center">
                                    <img class="h-10 w-auto" src="<?= URL_DIR ?>public/assets/images/wikipedia.svg" alt="Wiki image" />
                                    <span class="ml-2"><img src="<?= URL_DIR ?>public/assets/images/wikipedia-wordmark-fr.svg" alt="Wiki Name image" /></span>
                                </div>
                                <h2 class="font-lora mt-10 text-center text-2xl  leading-9 tracking-tight text-gray-900">
                                    Sign up
                                </h2>
                            </div>

                            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

                                <form class="space-y-6" action="signup/register" method="POST">
                                    <div>
                                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full name</label>
                                        <div class="mt-2">
                                            <input id="name" name="name" type="text" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                            <small></small>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                                        <div class="mt-2">
                                            <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                            <small></small>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="flex items-center justify-between">
                                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                        </div>
                                        <div class="mt-2">
                                            <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                            <small></small>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="submit" class=" flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            Sign up
                                        </button>
                                    </div>
                                </form>

                                <!-- / form -->
                                <p class="mt-10 text-center text-sm text-gray-500">
                                    Do you have an account?
                                    <a href="login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Log in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1  text-center hidden lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat" style="background-image: url('<?= URL_DIR ?>public/assets/images/dakota-corbin-a-AWnRtwlWM-unsplash.jpg');"></div>
            </div>
        </div>
    </div>


    <!-- Form Validation  -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("form");

            form.addEventListener("submit", function(event) {

                // Prevent the default form submission
                event.preventDefault();

                function validateEmail(email) {
                    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    return emailRegex.test(email);
                }

                // Validate the form fields
                const name = document.getElementById("name").value;
                const email = document.getElementById("email").value;
                const password = document.getElementById("password").value;

                const errors = [];

                // Validate name
                const nameErrorMessage = document.querySelector("#name + small");
                if (name.trim() === "" || name.length < 6 || !name.match(/^[A-Za-z]{3,}\s[A-Za-z]{3,}$/)) {
                    errors.push("Name is required");
                    nameErrorMessage.textContent = "Name is required and  should consist of two parts, each with a minimum of 3 letters ";
                    nameErrorMessage.classList.add("error-message");
                } else {
                    nameErrorMessage.textContent = "";
                    nameErrorMessage.classList.remove("error-message");
                }

                // Validate email
                const emailErrorMessage = document.querySelector("#email + small");
                if (email.trim() === "" || !validateEmail(email)) {
                    errors.push("Email address is required");
                    emailErrorMessage.textContent = "Email address is required";
                    emailErrorMessage.classList.add("error-message");
                } else {
                    emailErrorMessage.textContent = "";
                    emailErrorMessage.classList.remove("error-message");
                }

                // Validate password
                const passwordErrorMessage = document.querySelector("#password + small");
                if (password.trim() === "" || password.length < 6) {
                    errors.push("Password is required and must be at least 6 characters");
                    passwordErrorMessage.textContent = "Password is required and must be at least 6 characters";
                    passwordErrorMessage.classList.add("error-message");
                } else {
                    passwordErrorMessage.textContent = "";
                    passwordErrorMessage.classList.remove("error-message");
                }

                // If there are validation errors, prevent form submission
                if (errors.length > 0) {
                    return false;
                }

                // If validation passes, submit the form
                form.submit();
            });
        });
    </script>

    <!-- / Form Validation  -->

</body>

</html>