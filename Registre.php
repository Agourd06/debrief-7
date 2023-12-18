        <?php
        @include 'DataBase.php';

        $error = array();
       
        
        if (isset($_POST['add_user'])) {
            $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
        
            // Check if password and confirmation password match
            if ($password !== $cpassword) {
                $error[] = 'Password and confirmation password do not match!';
            } else {
                $pass = password_hash($password, PASSWORD_DEFAULT);

                $insertUser = "INSERT INTO users (firstName, familyName, username, pw) VALUES (?, ?, ?, ?)";
                 $stmtUser = mysqli_prepare($conn, $insertUser);
                 mysqli_stmt_bind_param($stmtUser, "ssss", $fname, $lname, $username, $pass);
                 mysqli_stmt_execute($stmtUser);

                // Get the inserted user's ID
                $userId = mysqli_insert_id($conn);

                // Associate user with selected roles in roleofuser table
                $selectedRoles = isset($_POST['user-type']) ? $_POST['user-type'] : array();
                foreach ($selectedRoles as $selectedRole) {
                    $roleSelect = "SELECT rolename FROM roles WHERE rolename = ?";
                    $stmtRole = mysqli_prepare($conn, $roleSelect);
                    mysqli_stmt_bind_param($stmtRole, "s", $selectedRole);
                    mysqli_stmt_execute($stmtRole);
                    mysqli_stmt_store_result($stmtRole);
        
                    if (mysqli_stmt_num_rows($stmtRole) > 0) {
                        // Role exists, proceed with user insertion
                        $insertRoleOfUser = "INSERT INTO roleofuser (userId, rolename) VALUES (?, ?)";
                        $stmtRoleOfUser = mysqli_prepare($conn, $insertRoleOfUser);
                        mysqli_stmt_bind_param($stmtRoleOfUser, "is", $userId, $selectedRole);
                        mysqli_stmt_execute($stmtRoleOfUser);

                        
                    } else {
                        $error[] = 'Invalid user type: ' . $selectedRole;
                    }

                }

                header("Location:adress.php");
                exit;
            }
        }
        
        
        if (isset($_POST['operation']) && $_POST['editing'] === 'Edit') {
            $id = $_POST["userid"];
            $userinfo = "SELECT * FROM users WHERE userid = $id";
            $stk_user_info = $conn->query($userinfo);
            $rows = mysqli_fetch_assoc($stk_user_info);

            // Populate variables with retrieved data
            $firstname = $rows["firstName"];
            $lastname = $rows["familyName"];
            $username = $rows["username"];
            $password = $rows["pw"];
            $cpassword = $rows["pw"];
            
        }


        if (isset($_POST['edited'])) {
            // Retrieve data from the form
            $id = $_POST["userid"];
            $newFirstName = mysqli_real_escape_string($conn, $_POST['firstname']);
            $newFamilyName = mysqli_real_escape_string($conn, $_POST['lastname']);
            $newUsername = mysqli_real_escape_string($conn, $_POST['username']);
            $newPassword = $_POST['password'];

            // Add password hashing logic if needed
            $newPass = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update user records based on user ID
            $updateSql = "UPDATE users SET firstName = '$newFirstName', familyName = '$newFamilyName', username = '$newUsername', pw = '$newPass' WHERE userId = $id";
            $conn->query($updateSql);

            // Update role in the roles table
            $roleSelect = "UPDATE roles SET rolename = ? WHERE rolename = ?";
            $stmtRole = mysqli_prepare($conn, $roleSelect);
            mysqli_stmt_bind_param($stmtRole, "ss", $_POST['user-type'], $_POST['original_user_type']);
            mysqli_stmt_execute($stmtRole);
            mysqli_stmt_store_result($stmtRole);

            // Update role in the roleofuser table
            $roleOfUserUpdate = "UPDATE roleofuser SET rolename = ? WHERE userId = ?";
            $stmtRoleOfUser = mysqli_prepare($conn, $roleOfUserUpdate);
            mysqli_stmt_bind_param($stmtRoleOfUser, "si", $_POST['user-type'], $id);
            mysqli_stmt_execute($stmtRoleOfUser);

            header('location: adress.php');
            exit;
        }

        $catchid = "SELECT userId from users";
        $idResult = $conn->query($catchid);
        $userIds = [];
        
        // Fetch all user IDs into an array
        while ($row = $idResult->fetch_assoc()) {
            $userIds[] = $row['userId'];
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
                    background-image: linear-gradient(150deg, #26446C, #C6B380);
                }
            </style>



            <title>CIH_BANQUE LOGIN</title>
        </head>

        <body>


            <section class=" bg  p-[20px]">
                <div class="min-h-[85vh] w-[90%] m-auto gap-[15px] flex flex-col md:flex-row md:justify-evenly items-center  ">
            

                    <form action="Registre.php" method="post" class="flex flex-col gap-[19px] h-[70%] md:h-[80%] w-[80%] md:w-[30%] mb-[15px] p-[10px] bg-gray-300/20 items-center justify-center rounded-[20px]">
                        <h3 class="text-3xl mb-2.5 uppercase font-medium text-gray-900">ADD USER</h3>
        <?php
        if (!empty($error)) {
            echo '<div style="color: red;">';
            foreach ($error as $err) {
                echo $err . '<br>';
            }
            echo '</div>';
        }
        ?>
                        <input type="text" name="firstname" required placeholder="Enter Your FirstName" value="<?php echo isset($firstname) ? $firstname : ''; ?>" class="outline-none     h-[3rem] p-[5px] w-[85%] rounded">
                        <input type="text" name="lastname" required placeholder="Enter Your LastName" value="<?php echo isset($lastname) ? $lastname : ''; ?>" class="outline-none     h-[3rem] p-[5px] w-[85%] rounded">
                        <input type="text" name="username" required placeholder="Enter Your username" value="<?php echo isset($username) ? $username : ''; ?>" class="outline-none     h-[3rem] p-[5px] w-[85%] rounded">

                        <input type="password" name="password" required placeholder="Enter Your password" value="<?php echo isset($password) ? $password : ''; ?>" class="outline-none      h-[3rem] w-[85%] p-[5px] rounded">
                        <input type="password" name="cpassword" required placeholder="confirme Your password" value="<?php echo isset($password) ? $password : ''; ?>" class="outline-none     h-[3rem] w-[85%] p-[5px] rounded">
                        <div class="w-[85%]">
                            <?php
                            $sqlrole = "SELECT * FROM roles";
                            $query = $conn->query($sqlrole);
                            while ($row = $query->fetch_assoc()) {
                           

                            
                            ?>
                        <label>
                            <input type="checkbox" name="user-type[]" value="<?= $row["rolename"] ?> " class="mr-2">
                            <?= $row["rolename"] ?>                        </label>
                      
                        <?PHP }?>

                        </div>


        <?php
        if (isset($_POST['userid']) && $_POST['editing'] === 'Edit') {
            echo '<input type="hidden" name="user_ids" value="' . implode(',', $userIds) . '">';
            echo '<input type="hidden" name="userid" value="' . (isset($id) ? $id : "") . '">';
            echo '<input type="submit" name="edited" value="Edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-[85%] rounded cursor-pointer">';
        } else {
            echo '<input type="submit" name="add_user" value="Add User" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-[85%] rounded cursor-pointer">';
        }
        ?>




                        <a href="adress.php"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-[85%] rounded cursor-pointer text-center">AJOUTER UNE ADRESS</a>
                        <p>already have an account?<a class="text-blue-700" href="index.php">login now</a></p>



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