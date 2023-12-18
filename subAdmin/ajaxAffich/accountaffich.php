<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>
    

<?php

@include "../DataBase.php";



    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';




if (isset($_POST['submit']) && isset($_POST['userid'])) {
            $userid = $conn->real_escape_string($_POST['userid']);

            // Fetch bank details based on the bankid
            $user_sql = "SELECT * FROM users WHERE userid = '$userid'";
            $user_result = $conn->query($user_sql);

            if ($user_result->num_rows > 0) {
                $user_row = $user_result->fetch_assoc();
                echo "<div class ='flex w-[100%]  justify-center h-[60px]  items-center text-black'>";
                echo "<p class=' w-[85%] h-[100%] flex items-center  justify-center'>Username : {$user_row["username"]}</p>";
                echo "<p class='w-[85%] h-[100%] flex items-center  justify-center'>first Name : {$user_row["firstName"]}</p>";
                echo "<p class=' w-[85%] h-[100%] flex items-center  justify-center'>family Name : {$user_row["familyName"]}</p>";
                echo "</div>";
            }

            // Fetch data based on the selected bankid for 'agency'
            $sql = "SELECT * FROM `account` WHERE userid = '$userid'AND RIB LIKE '%$searchTerm%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">';
                echo '<thead class="text-xs text-gray-700 upperclass=" w-[11%] px-6 py-3 text-center" scope="col" 
                        <tr>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">ID</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">RIB</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Balance</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Edit</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Delete</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Transactions</th>
                        </tr>
                    </thead>';
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["accountId"] . " </td>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["RIB"] . "  </td>
                            <td class='px-6 py-4 font-semibold text-center'> " . $row["balance"] . "  MAD</td>

                         
                               

                            <td >
                            <form action='addaccounts.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                            <input type='hidden' name='operation' value='" . $row["accountId"] . "'>
                            <input type='hidden' name='accountid' value='" . $row["accountId"] . "'>
                            <input type='submit'  name='editing' value='Edit' class=' cursor-pointer'>
                        </form>
                        
                            </td>
                            <td >
                            <form action='accounts.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                                <input type='hidden' name='delete' value='" . $row["accountId"] . "'>
                                <input type='submit'  name='deleteaccount' value='Delete' class=' cursor-pointer'>
                            </form>
                        </td>
                        <td >
                        <form action='transactions.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900'>

                            <input type='hidden' name='accountid' value='" . $row["accountId"] . "'>
                            <input type='submit' name='submit'  value='Show' class=' cursor-pointer'>
                            </form>
                            </td>
                        </tr>";
                }
                echo '</table>';
            } else {
                echo "<p class='text-center'>0 results</p>";
            }
        } else {
           
            $sqlall = "SELECT * FROM `account` WHERE RIB LIKE '%$searchTerm%'";
            $result2 = $conn->query($sqlall);

            if ($result2->num_rows > 0) {
                echo '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">';
                echo '<thead class="text-xs text-gray-700 upperclass=" w-[11%] px-6 py-3 text-center" scope="col" 
                        <tr>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">ID</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">RIB</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Balance</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Edit</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Delete</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Transactions</th>
                        </tr>
                    </thead>';
                while ($row = $result2->fetch_assoc()) {
                    echo "<tr>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["accountId"] . " </td>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["RIB"] . "  </td>
                            <td class='px-6 py-4 font-semibold text-center'> " . $row["balance"] . " MAD</td>

                         
                               

                            <td >
                            <form action='addaccounts.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                            <input type='hidden' name='operation' value='" . $row["accountId"] . "'>
                            <input type='hidden' name='accountid' value='" . $row["accountId"] . "'>
                            <input type='submit'  name='editing' value='Edit' class=' cursor-pointer'>
                        </form>
                        
                            </td>
                            <td >
                            <form action='accounts.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                                <input type='hidden' name='delete' value='" . $row["accountId"] . "'>
                                <input type='submit'  name='deleteaccount' value='Delete' class=' cursor-pointer'>
                            </form>
                        </td>
                        <td >
                        <form action='transactions.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900'>

                            <input type='hidden' name='accountid' value='" . $row["accountId"] . "'>
                            <input type='submit' name='submit'  value='Show' class=' cursor-pointer'>
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
        ?></body>
        </html>