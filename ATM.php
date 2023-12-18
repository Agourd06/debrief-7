<?php
@include "DataBase.php";


// Handle Delete action
if (isset($_POST['deleteATM']) && isset($_POST['delete'])) {
    $id = $_POST['delete'];
    // Delete associated records in the 'atm' table
    $deleteATM = "DELETE FROM atm WHERE atmid = $id";
    if ($conn->query($deleteATM) !== TRUE) {
        echo "Error deleting ATM: " . $conn->error;
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags and stylesheets go here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gestionaire Bancaire</title>
    <style>
        header {
            filter: drop-shadow(4px 4px 5px rgba(255, 255, 255));
            border: 1px white solid;
        }
    </style>
</head>

<body class ="bg-gray-100  bg-cover">
<header class="header sticky h-[12vh]  top-0 bg-white shadow-md flex items-center justify-between px-8 py-02 z-50 	">
            <a href="" class="flex items-center font-bold text-blue-950	gap-[7px]">
                <img src="images/CentralLogo.png" alt="" class="md:h-[60px] md:w-[150px] h-[35px] w-[90px]">
                ADMIN
            </a>
            <nav class="nav font-semibold w-[100%] text-lg">
                <ul class="flex items-center w-[100%] justify-center  ">

                    <li class="p-4 border-b-2 border-blue-500 border-opacity-0 hover:border-opacity-100 hover:text-blue-500 duration-200 cursor-pointer">
                        <select name="clients" id="selectOption" class="outline-none rounded">
                            <option class="font-semibold text-lg" value="Banks">Locations</option>

                            <option class="font-semibold text-lg" value="Banks">Banks</option>
                            <option class="font-semibold text-lg" value="agency">agency</option>
                            <option class="font-semibold text-lg" value="ATM">ATM</option>
                        </select>
                    </li>

                    <li class="p-4 border-b-2 border-blue-500 border-opacity-0 hover:border-opacity-100 hover:text-blue-500 duration-200 cursor-pointer">
                        <select name="clients" id="selectOptions1" class="outline-none rounded">
                            <option class="font-semibold text-lg" value="client">Operations</option>

                            <option class="font-semibold text-lg" value="client">Users</option>
                            <option class="font-semibold text-lg" value="accounts">accounts</option>
                            <option class="font-semibold text-lg" value="transactions">transactions</option>
                        </select>
                    </li>
                    <li class="p-4 border-b-2 border-red-500 border-opacity-0 hover:border-opacity-100 hover:text-red-500 duration-200 cursor-pointer">
                        <a href="index.php" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Log Out</a>
                    </li>
                </ul>
            </nav>

        </header>

        <div class="flex justify-evenly items-center  h-[20vh] ">
            <h1 class="text-[50px]    text-black">ATM</h1>
            <a href="addagency.php" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 border border-blue-600 rounded">ADD ATM</a>

        </div>


        <section class="min-h-[75vh]">

        <?php
        if (isset($_POST['submit']) && isset($_POST['bankid'])) {
            $bankid = $conn->real_escape_string($_POST['bankid']);

            $bank_sql = "SELECT * FROM bank WHERE bankid = '$bankid'";
            $bank_result = $conn->query($bank_sql);

            if ($bank_result->num_rows > 0) {
                $bank_row = $bank_result->fetch_assoc();
                echo "<div class ='flex w-[100%]  justify-center h-[60px]  items-center text-black'>";
                echo "<img class=' w-[15%] h-[100%] flex items-center  justify-center' src='{$bank_row['logo']}' > ";
                echo "<p class='w-[85%] h-[100%] flex items-center  justify-center'>Bank : {$bank_row["name"]}</p>";
                echo "</div>";
            }

            $sql = "SELECT * FROM atm WHERE bankid = '$bankid'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">';
                echo '<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">ID</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Adress</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Bank Id</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Edit</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Delete</th>
                          
                          
                        </tr>
                    </thead>';
                while ($row = $result->fetch_assoc()) {
                    echo ' <tbody class="h-[2vh] ">';

                    echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bclass='px-6 py-4 font-semibold text-center'>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["atmId"] . " </td>
                            <td class='px-6 py-4 font-semibold text-center'> " . $row["adress"] . "</td>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["bankId"] . "</td>
                           
                            <td >
                            <form action='addATM.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                            <input type='hidden' name='operation' value='" . $row["atmId"] . "'>
                            <input type='hidden' name='atmid' value='" . $row["atmId"] . "'>
                            <input type='submit'  name='editing' value='Edit' class ='cursor-pointer'>
                        </form>
                        
                            </td>
                       
                          
                           <td >
                           
                                <form action='ATM.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                                    <input type='hidden' name='delete' value='" . $row["atmId"] . "'>
                                    <input type='submit'  name='deleteATM' value='Delete' class ='cursor-pointer'>
                                </form>
                            </td>
                        </tr>";
                }
                echo '</table>';
            } else {
                echo "<p class='text-center'>0 results</p>";
            }
        } else {
           
            $sqlATM = "SELECT * FROM atm";
            $result2 = $conn->query($sqlATM);

            if ($result2->num_rows > 0) {
                echo '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">';
                echo '<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                <th class=" w-[11%] px-6 py-3 text-center" scope="col"">ID</th>
                <th class=" w-[11%] px-6 py-3 text-center" scope="col"">Adress</th>
                <th class=" w-[11%] px-6 py-3 text-center" scope="col"">Bank Id</th>
                <th class=" w-[11%] px-6 py-3 text-center" scope="col"">Edit</th>
                <th class=" w-[11%] px-6 py-3 text-center" scope="col"">Delete</th>
      
            </tr>
                    </thead>';
                while ($row = $result2->fetch_assoc()) {

                    echo ' <tbody class="h-[2vh] ">';

                    echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bclass='px-6 py-4 font-semibold text-center'></td>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["atmId"] . " </td>
                            <td class='px-6 py-4 font-semibold text-center'> " . $row["adress"] . "</td>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["bankId"] . "</td>

                            
                            <td >
                            <form action='addATM.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                            <input type='hidden' name='operation' value='" . $row["atmId"] . "'>
                            <input type='hidden' name='atmid' value='" . $row["atmId"] . "'>
                            <input type='submit'  name='editing' value='Edit' class ='cursor-pointer'>
                        </form>
                        
                            </td>
                            <td >
                            <form action='ATM.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                                <input type='hidden' name='delete' value='" . $row["atmId"] . "'>
                                <input type='submit'  name='deleteATM' value='Delete' class ='cursor-pointer'>
                            </form>
                        </td>
                        </tr>";
                }
                echo '</table>';
            } else {
                echo "<p class='text-center'>0 results</p>";
            }
        }
        $conn->close();
        ?>
    </section>

    <footer class="text-center h-[5vh] text-white bg-black flex items-center justify-center">
        <h2>Copyright © 2030 Hashtag Developer. All Rights Reserved</h2>
    </footer>
    <script src="navbar.js">

    </script>

</body>

</html>