<?php


@include 'database.php';
if (isset($_POST["bankid"])) {
    $id = $_POST["bankid"];
    if (!empty($id)) {
        $bnkinfo = "SELECT * FROM bank where bankid = $id";
        $stk_bnk_info = $conn->query($bnkinfo);

        if ($stk_bnk_info) {
            $rows = mysqli_fetch_assoc($stk_bnk_info);
            $logo = $rows["logo"];
            $name = $rows["name"];
        } else {
            echo "Error fetching bank information: " . $conn->error;
        }
    } else {
        echo "Bank ID is empty.";
    }
}


if (isset($_POST['submit'])) {
    // Sanitize user inputs
    $logo = mysqli_real_escape_string($conn, $_POST['logo']);
    $name = mysqli_real_escape_string($conn, $_POST['bankname']);

    // Insert new bank into the 'bank' table
    $insertQuery = "INSERT INTO bank (logo, name) VALUES ('$logo', '$name')";

    $conn->query($insertQuery);

    header('location: banques.php');
}
if (isset($_POST["operation"]) && $_POST["operation"] === "edit") {
    // Retrieve bank details for editing
    $id = $_POST["bankid"];
    $bnkinfo = "SELECT * FROM bank WHERE bankid = $id";
    $stk_bnk_info = $conn->query($bnkinfo);
    $rows = mysqli_fetch_assoc($stk_bnk_info);

    // Populate variables with retrieved data
    $logo = $rows["logo"];
    $name = $rows["name"];
}

if (isset($_POST['edited'])) {

    $logo = mysqli_real_escape_string($conn, $_POST['logo']);
    $name = mysqli_real_escape_string($conn, $_POST['bankname']);
    $id = $_POST['bankid'];
    $updateQuery = "UPDATE bank SET logo='$logo', name='$name' WHERE bankid=$id";
    $conn->query($updateQuery);
    header('location: banques.php');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg {
            background-image: linear-gradient(150deg, #26446C, #C6B380);        }
    </style>

    <title>ADD BANK</title>
</head>

<body>

    <section class=" bg ">
        
        <div class="min-h-[85vh] w-[90%] m-auto gap-[15px] flex flex-col md:flex-row md:justify-evenly items-center  ">

            <form action="addbank.php" method="post" class="flex flex-col gap-[19px] h-[70%] md:h-[80%] w-[80%] md:w-[30%] mb-[15px] p-[10px] bg-gray-300/20 items-center justify-center rounded-[20px]">

                <h1 class="md:text-[45px] text-[35px] text-gray-900 font-bold">Banks</h1>

                <input type="text" name="logo" placeholder="Add Logo" value="<?php echo isset($logo) ? $logo : ''; ?>" class="outline-none bg-gray-200 border border-black/50 border-solid md:h-[3rem] h-[2rem] p-[10px] w-[85%] rounded">

                <input type="text" name="bankname" placeholder="Bank Name" value="<?php echo isset($name) ? $name : ''; ?>" class="outline-none bg-gray-200 border border-black/50 border-solid md:h-[3rem] h-[2rem] w-[85%] p-[10px] rounded">

                <!-- Hidden input for bankid -->
                <input type="hidden" name="bankid" value="<?php echo isset($id) ? $id : ''; ?>">

                <?php
                if (isset($_POST['bankid'])) {
                    echo '<input type="submit" name="edited" value="Edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-[85%] rounded cursor-pointer">';
                } else {
                    echo '<input type="submit" name="submit" value="Add Bank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-[85%] rounded cursor-pointer">';
                };
                ?>
          <a href="banques.php" class="bg-blue-500 w-[85%] text-center hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Banks details</a>

            </form>

        </div>

    </section>
    <footer class="bg-gray-900 h-[15vh]  shadow sm:flex sm:items-center sm:justify-between p-4 sm:p-6 xl:p-8 dark:bg-gray-800 antialiased">
        <p class="mb-4 text-sm text-center text-gray-500 dark:text-gray-400 sm:mb-0">
            &copy; 2023-2024 <a href="https://flowbite.com/" class="hover:underline" target="_blank">Flowbite.com</a>. All rights reserved.
        </p>
        <div class="flex justify-center items-center space-x-1">
            <a href="#" data-tooltip-target="tooltip-facebook" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Facebook</span>
            </a>
            <div id="tooltip-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                Like us on Facebook
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="#" data-tooltip-target="tooltip-twitter" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z" />
                </svg>
                <span class="sr-only">Twitter</span>
            </a>
            <div id="tooltip-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                Follow us on Twitter
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="#" data-tooltip-target="tooltip-github" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="gray" width="21px" height="21px">
                    <path d="M 9.9980469 3 C 6.1390469 3 3 6.1419531 3 10.001953 L 3 20.001953 C 3 23.860953 6.1419531 27 10.001953 27 L 20.001953 27 C 23.860953 27 27 23.858047 27 19.998047 L 27 9.9980469 C 27 6.1390469 23.858047 3 19.998047 3 L 9.9980469 3 z M 22 7 C 22.552 7 23 7.448 23 8 C 23 8.552 22.552 9 22 9 C 21.448 9 21 8.552 21 8 C 21 7.448 21.448 7 22 7 z M 15 9 C 18.309 9 21 11.691 21 15 C 21 18.309 18.309 21 15 21 C 11.691 21 9 18.309 9 15 C 9 11.691 11.691 9 15 9 z M 15 11 A 4 4 0 0 0 11 15 A 4 4 0 0 0 15 19 A 4 4 0 0 0 19 15 A 4 4 0 0 0 15 11 z" />
                </svg>
                <span class="sr-only">instagram</span>
            </a>



        </div>
    </footer>


</body>

</html>