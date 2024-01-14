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

</head>

<body class="dark:bg-gray-900 text-gray-600">


    <!-- header -->

    <nav class="bg-white border-gray-200 dark:border-gray-600 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <!-- Logo -->
            <a href="article.html" class="flex items-center space-x-3 rtl:space-x-reverse">
                <div class="flex items-center justify-center">
                    <img class="h-10 w-auto" src="<?= URL_DIR ?>public/assets/images/wikipedia.svg" alt="Wiki image" />
                    <span class="ml-2"><img src="<?= URL_DIR ?>public/assets/images/wikipedia-wordmark-fr.svg" alt="Wiki Name image" /></span>
                </div>
            </a>

            <button data-collapse-toggle="mega-menu-full" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu-full" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <div id="mega-menu-full" class="items-center justify-between font-medium hidden w-full md:flex md:w-auto md:order-1">
                <ul class="flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="home" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
                    </li>
                    <li>
                        <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded md:w-auto hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                            Company
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Marketplace</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Resources</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>

                <?php if (!isset($_SESSION['id'])) { ?>
                    <!-- Login -->
                    <a href="login">
                        <button class="ml-14 inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0 dark:text-gray-400 dark:focus:ring-gray-700 dark:bg-gray-700">
                            Login
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </a>
                    <!-- Login -->
                <?php } else { ?>

                    <!-- User -->
                    <button type="button" class="ml-12 flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
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

                <?php }  ?>
                <!-- dark mode button -->
                <button id="theme-toggle" type="button" class="ml-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <!-- /dark mode button -->
            </div>
        </div>

        <!-- dropdown header -->
        <div id="mega-menu-full-dropdown" class="mt-1 border-gray-200 shadow-sm bg-gray-50 md:bg-white border-y dark:bg-gray-800 dark:border-gray-600 hidden ">
            <div class="grid max-w-screen-xl px-4 py-5 mx-auto text-gray-900 dark:text-white sm:grid-cols-2 md:px-6">
                <ul>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Online Stores</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already
                                using.</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Segmentation</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already
                                using.</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Marketing CRM</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already
                                using.</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Online Stores</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already
                                using.</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Segmentation</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already
                                using.</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Marketing CRM</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already
                                using.</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- / header -->


    <!-- Hero section -->

    <div class="container my-24 mx-auto md:px-6">
        <section class="mb-32 text-center md:text-left">
            <h2 class="mb-12 text-center text-4xl font-bold font-lora">
                Latest Articles
            </h2>

            <?php
            $counter = 0;

            foreach ($wikis as $wiki) {
                // Alternance entre left et right
                $positionClass = ($counter % 2 === 0) ? 'md:order-1' : 'md:order-2';
            ?>
                <div class="mb-12 grid items-center gap-x-6 md:grid-cols-2 xl:gap-x-12">
                    <div class="mb-6 <?= $positionClass ?> md:mb-0">
                        <div class="relative mb-6 overflow-hidden rounded-lg bg-cover bg-no-repeat shadow-lg dark:shadow-black/20" data-te-ripple-init data-te-ripple-color="light">
                            <img class="rounded-lg" src="public/assets/uploads/<?= $wiki['image'] ?>" alt="<?= $wiki['title'] ?>">
                            <a href="article/show/<?= $wiki['id'] ?>">
                                <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]"></div>
                            </a>
                        </div>
                    </div>

                    <div class="<?= ($counter % 2 === 0) ? 'md:order-2' : 'md:order-1' ?>">
                        <h3 class="mb-3 text-2xl font-bold"><?= $wiki['title'] ?></h3>
                        <div class="mb-3 flex items-center justify-center text-sm font-medium text-danger dark:text-danger-500 md:justify-start">
                            <img class="mr-2 h-5 w-5" src="public/assets/uploads/<?= $wiki['imageCat'] ?>" alt="<?= $wiki['nameCat'] ?>">
                            <?= $wiki['Categorie'] ?>
                        </div>
                        <p class="mb-6 text-neutral-500 dark:text-neutral-300">
                            <small>Published <u><?= $wiki['day'] ?>.<?= $wiki['month'] ?>.<?= $wiki['year'] ?></u> by
                                <a href="#!"><?= $wiki['Author'] ?></a></small>
                        </p>
                        <p class="text-neutral-500 dark:text-neutral-300">
                            <?= $wiki['description'] ?>
                        </p>
                    </div>
                </div>

            <?php
                $counter++;
            }
            ?>

        </section>
    </div>

    <!-- / Hero section -->

    <!-- Articles  -->
    <div class="container my-24 mx-auto md:px-6">
        <div class="mb-12 text-center">
            <h2 class="text-dark mb-3.5 text-2xl font-bold sm:text-4xl xl:text-heading-3 font-lora">
                Browse by Category
            </h2>
            <p>Select a category to see more related content</p>
        </div>

        <!-- Filter picker   -->
        <section class="text-gray-600 body-font mb-12">
            <div class="container mx-auto flex flex-col px-5 justify-center items-center">

                <form id="searchForm" class="flex w-3/4 items-center">
                    <span class="mx-4 text-gray-500">|</span>
                    <!-- First   -->
                    <div class="relative w-2/4">
                        <input type="text" id="search" class="w-full backdrop-blur-sm bg-white/20 py-2 pl-10 pr-4 rounded-lg focus:outline-none border-2 border-gray-100 focus:border-violet-300 transition-colors duration-300" placeholder="Search..." />

                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                    </div>
                    <span class="mx-4 text-gray-500">|</span>
                    <!-- Second   -->
                    <select id="categorie" name="categorie" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                focus:border-blue-500 block ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600
                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                relative w-2/5 ">

                        <option selected value=''>All</option>
                        <?php

                        foreach ($categories as $categorie) {
                            echo "<option value='{$categorie['id']}'>{$categorie['name']}</option>";
                        }
                        ?>
                    </select>
                    <span class="mx-4 text-gray-500">|</span>
                </form>

            </div>
        </section>
        <!-- / Filter picker   -->

        <!--  Articles  -->
        <section class="mb-32 text-center md:text-left">

            <div class="mb-6 flex flex-wrap" id="container">

            </div>

        </section>
        <!-- / Articles  -->
    </div>
    <!-- Articles -->

    <!--  footer -->
    <?php include "../app/View/includes/footer.php"; ?>
    <!-- / footer -->



    <script>
        const searchForm = document.getElementById("searchForm");
        const search = document.getElementById("search");
        const categorie = document.getElementById("categorie");
        const container = document.getElementById("container");

        categorie.addEventListener("change", () => {
            container.innerHTML = "";
            load(search.value, categorie.value);
        });

        searchForm.addEventListener("submit", (event) => {
            event.preventDefault(); // Empêche le rafraîchissement de la page par défaut
            container.innerHTML = "";
            load(search.value, categorie.value);
        });

        search.addEventListener("keyup", () => {
            const inputValue = search.value;
            container.innerHTML = "";
            load(inputValue, categorie.value);
        });


        function load(title, categorie) {
            fetch(`http://localhost/wiki/home/searchwikis/?title=${title}&id=${categorie}`)
                .then(response => response.json())
                .then(function(result) {
                    result.forEach((element) => {
                        container.innerHTML += `


                    <div class="mb-6 flex flex-wrap">
                    <div class="mb-6 ml-auto w-full shrink-0 grow-0 basis-auto px-3 md:mb-0 md:w-3/12">
                        <div class="relative mb-6 overflow-hidden rounded-lg bg-cover bg-no-repeat shadow-lg dark:shadow-black/20" data-te-ripple-init data-te-ripple-color="light">

                            <img class="w-full" src="public/assets/uploads/${element.image}" alt=" ${element.title}">
                            <a href="article/show/${element.id}">
                                <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]"></div>
                            </a>
                        </div>
                    </div>

                    <div class="mb-6 mr-auto w-full shrink-0 grow-0 basis-auto px-3 md:mb-0 md:w-9/12 xl:w-7/12">
                        <h5 class="mb-3 text-lg font-bold">${element.title}</h5>

                        <div class="mb-3 flex items-center justify-center text-sm font-medium text-danger dark:text-danger-500 md:justify-start">


                            <img class="mr-2 h-4 w-4" src="public/assets/uploads/${element.imageCat}" alt="${element.nameCat}">

                            ${element.Categorie}
                        </div>
                        <p class="mb-6 text-neutral-500 dark:text-neutral-300">
                            <small>Published <u>${element.day}.${element.month}.${element.year}</u> by
                                <a href="#!">${element.Author}</a></small>
                        </p>
                        <p class="text-neutral-500 dark:text-neutral-300">
                        ${element.description}
                        </p>
                    </div>
                </div> `;
                    });
                })
                .catch(error => console.log('error', error));
        }


        load("", "");
    </script>


    <!-- / For dark mode -->
    <script src="<?= URL_DIR ?>public/assets/js/darkmode.js"></script>
    <!-- / For navbar mobile -->
    <script src="<?= URL_DIR ?>node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>