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

    <script src="https://cdn.tiny.cloud/1/q505dyz9r8h30v3q0elmp2c2978iah9n3ohh96hensuylgsb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


</head>

<body class="font-poppins text-gray-600 dark:bg-gray-900">
    <div class="flex w-screen h-screen text-gray-700">
        <!-- Component Start -->

        <!-- aside -->
        <div class="flex flex-col items-center w-16 pb-4 overflow-auto border-r border-gray-300">
            <a class="flex items-center justify-center flex-shrink-0 w-full h-16 bg-gray-300" href="">
                <img src="<?= URL_DIR ?>public/assets/images/wikipedia.svg" alt="">
            </a>
            <a href="dashboard" class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>
            <a href="wiki" class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </a>
            <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300" href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
            </a>
            <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300" href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </a>
            <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300" href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </a>
            <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 mt-auto rounded hover:bg-gray-300" href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        </div>
        <!-- / aside -->

        <div class="flex flex-col w-30 ">
            <button class="relative text-sm focus:outline-none group">
                <div class="flex items-center justify-between w-full h-16 px-4 border-b ">
                    <img src="<?= URL_DIR ?>public/assets/images/wikipedia-wordmark-fr.svg" alt="">

                </div>
                <div class="absolute z-10 flex-col items-start hidden w-full pb-1 bg-white shadow-lg group-focus:flex">
                </div>

            </button>
            <div class="flex flex-col flex-grow p-4 overflow-auto ">
                <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300 mb-4 font-lora" href="dashboard">
                    <span class="leading-none">Dashboard</span>
                </a>
                <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300 mb-4 font-lora" href="wiki">
                    <span class="leading-none"> Wikis</span>
                </a>
                <a href="categorie" class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300 mb-4 font-lora">
                    <span class="leading-none"> Categories</span>
                </a>
                <a href="tag" class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300 mb-4 font-lora">
                    <span class="leading-none"> Tags</span>
                </a>
                <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300" href="#">
                    <span class="leading-none">Item 5</span>
                </a>
                <a class="flex items-center flex-shrink-0 h-10 px-3 mt-auto text-sm font-medium bg-gray-200 rounded hover:bg-gray-300" href="#">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span class="ml-2 leading-none">New Item</span>
                </a>
            </div>
        </div>

        <div class="flex flex-col flex-grow">
            <div class="flex items-center flex-shrink-0 h-16 px-8 border-b border-gray-300 justify-end mr-5">
                <!-- toggle dark mode -->
                <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button" class="mr-5 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <!-- User -->
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo" />
                </button>

                <!-- Dropdown -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-2">
                    <div class="px-4 py-3" role="none">
                        <p class="text-sm text-gray-900 dark:text-white" role="none">

                            <?= $_SESSION['name'] ?>
                        </p>
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                            <?= $_SESSION['email'] ?>
                        </p>
                    </div>
                    <ul class="py-1" role="none">

                        <li>
                            <a href="home" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Wiki Home</a>
                        </li>
                        <?php if ($_SESSION['role_id'] == 1) { ?>
                            <li>
                                <a href="wiki" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                            </li>
                        <?php } else { ?>

                            <li>
                                <a href="dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                            </li>
                        <?php  } ?>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                        </li>
                        <li>
                            <form action="login/logout" method="POST">
                                <!-- <button name="logout" class=" inline-flex items-center justify-center bg-gray-100 border-0 py-1 px-3 focus:outline-none  rounded text-base mt-4 md:mt-0 dark:text-gray-400 dark:focus:ring-gray-700 dark:bg-gray-700">
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Log out</a>
                                </button> -->
                                <div class="flex justify-center">
                                    <button name="logout" class="inline-flex items-center justify-center bg-gray-100 border-0 py-1 px-3 focus:outline-none rounded text-base mt-4 md:mt-0 dark:text-gray-400 dark:focus:ring-gray-700 dark:bg-gray-700 mx-auto">
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Log out</a>
                                    </button>
                                </div>

                            </form>

                        </li>
                    </ul>
                </div>
                <!-- / Dropdown -->
            </div>

            <!-- Main -->
            <div class="flex-grow p-6 overflow-auto bg-gray-200 dark:bg-gray-600">
                <div class="grid grid-cols-3 gap-6">
                    <div class="h-full col-span-3 bg-white border border-gray-300">
                        <main class="mt-14 p-12 ml-0 smXl:ml-64 dark:border-gray-700">

                            <div class="bg-white dark:bg-gray-800 border border-[#D9D9DE] dark:border-gray-700 rounded-xl p-8 mb-12">
                                <!-- Start block -->
                                <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">

                                    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

                                        <div class="bg-white border border-4 rounded-lg shadow relative m-10">

                                            <div class="flex items-center justify-center  p-5 border-b rounded-t">
                                                <h1 class="text-2xl font-bold text-center mb-6 text-gray-900 dark:text-white font-lora">
                                                    Add <span class="text-gray-500 font-lora"> Categorie </span>
                                                </h1>
                                            </div>

                                            <div class="p-6 space-y-6">
                                                <form action="addcategorie/create" method="POST" enctype="multipart/form-data">
                                                    <div class="grid grid-cols-6 gap-6">
                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                                                            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="New categorie" required>
                                                        </div>
                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="image" class="text-sm font-medium text-gray-900 block mb-2">image</label>
                                                            <input type="file" name="image" id="image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                                        </div>

                                                    </div>
                                                    <div class="p-6 border-t border-gray-200 rounded-b">
                                                        <button type="submit" class="text-dark  bg-gray-100 hover:bg-cyan-700 focus:ring-4 ocus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-700 dark:text-gray-400 dark:focus:ring-gray-700">Save </button>
                                                    </div>
                                                </form>
                                            </div>




                                        </div>
                                    </div>

                                </section>

                            </div>

                        </main>
                    </div>
                </div>
            </div>
            <!-- / Main -->
        </div>
        <!-- Component End  -->
    </div>

    <!-- / For dark mode -->
    <script src="<?= URL_DIR ?>public/assets/js/darkmode.js"></script>
    <!-- / For navbar mobile -->
    <script src="<?= URL_DIR ?>node_modules/flowbite/dist/flowbite.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>