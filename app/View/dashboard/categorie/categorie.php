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
            <a href="tag" class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300">
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
                    <span class="leading-none"> Dashboard</span>
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

                <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300 font-lora" href="#">
                    <span class="leading-none">Item 5</span>
                </a>
                <a class="flex items-center flex-shrink-0 h-10 px-3 mt-auto text-sm font-medium bg-gray-200 rounded hover:bg-gray-300 font-lora" href="#">
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
                            Neil Sims
                        </p>
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                            neil.sims@flowbite.com
                        </p>
                    </div>
                    <ul class="py-1" role="none">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                        </li>
                        <li>
                            <form action="login/logout" method="POST">
                                <button name="logout" class="ml-14 inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none  rounded text-base mt-4 md:mt-0 dark:text-gray-400 dark:focus:ring-gray-700 dark:bg-gray-700">
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Log out</a>
                                </button>
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
                                    <h1 class="text-2xl font-bold text-center mb-6 text-gray-900 dark:text-white font-lora">
                                        <span class="text-gray-500 font-lora">Categories</span> Table
                                    </h1>

                                    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                                        <!-- Start coding here -->

                                        <!-- <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden"> -->
                                        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden overflow-y-visible ">
                                            <div class="flex justify-end items-center w-full md:w-full">
                                                <!-- Search -->
                                                <div class="w-full">

                                                </div>
                                                <!-- / Search -->

                                                <!-- Div avec le bouton aligné à droite -->
                                                <div class="flex justify-end items-center mb-3">
                                                    <a href="addcategorie">
                                                        <button type="button" id="createProductModalButton" data-modal-target="createProductModal" data-modal-toggle="createProductModal" class="md:w-auto flex items-center justify-end py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                                            </svg>
                                                            Add Categorie
                                                        </button>
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="overflow-x-auto">
                                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                        <tr>
                                                            <!-- <th scope="col" class="px-4 py-3">Image</th> -->
                                                            <th scope="col" class="px-4 py-3">ID</th>
                                                            <th scope="col" class="px-4 py-3">Name</th>
                                                            <th scope="col" class="px-4 py-3  text-gray-400">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($categories as $categorie) { ?>

                                                            <tr class="border-b dark:border-gray-700">
                                                                <!-- <td class="px-4 py-3 text-center"> </td> -->
                                                                <td class="px-4 py-3 text-center"><?= $categorie['id'] ?></td>
                                                                <td class="px-4 py-3 text-center"><?= $categorie['name']  ?></td>

                                                                <td class="px-4 py-3 text-center  overflow-visible">
                                                                    <button id="dropdownTopButton" data-dropdown-toggle="dropdownTop" data-dropdown-placement="top" class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                        </svg>
                                                                    </button>

                                                                    <!-- Dropdown menu -->
                                                                    <div id="dropdownTop" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownTopButton">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <button type="button" data-modal-target="updateProductModal" data-modal-toggle="updateProductModal" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                                                        </svg>
                                                                                        Edit
                                                                                    </button>
                                                                                </a>
                                                                            </li>

                                                                            <li>

                                                                                <a href="categorie/delete/<?= $categorie['id'] ?>">
                                                                                    <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                                                                        <svg class="w-4 h-4 mr-2" viewbox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                                                                                        </svg>
                                                                                        Delete
                                                                                    </button>

                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
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