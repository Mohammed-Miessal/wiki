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

<body class="bg-white dark:bg-gray-900">
    <!-- header -->
    <?php include "../app/View/includes/header.php"; ?>
    <!-- /header -->


    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased text-gray-500 dark:text-gray-400">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <?php echo $wikiContent['content']; ?>
            </article>
        </div>
    </main>

    <!--  Auther -->
    <!-- <address class="flex items-center justify-center not-italic mt-2 lg:mt-2 not-format mb-24">
        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
            <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos" />
            <div>
                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Jese Leos</a>
                <p class="text-base text-gray-500 dark:text-gray-400">
                    Graphic Designer, educator & CEO Flowbite
                </p>
                <p class="text-base text-gray-500 dark:text-gray-400">
                    <time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time>
                </p>
            </div>
        </div>
    </address> -->
    <!--  / Auther -->



    <!--  footer -->
    <?php include "../app/View/includes/footer.php"; ?>
    <!-- / footer -->

    <!-- / For dark mode -->
    <script src="<?= URL_DIR ?>public/assets/js/darkmode.js"></script>
    <!-- / For navbar mobile -->
    <script src="<?= URL_DIR ?>node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>