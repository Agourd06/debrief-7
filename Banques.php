<?php
session_start();

@include "DataBase.php";


// Handle Delete action
if (isset($_POST['Deletes']) && isset($_POST['bankid'])) {
    $id = $_POST['bankid'];

    $deleteAgencies = "DELETE FROM agency WHERE bankId = $id";
    $conn->query($deleteAgencies);

    $deleteATM = "DELETE FROM atm WHERE bankid = $id";
    $conn->query($deleteATM);

    $deleteBank = "DELETE FROM bank WHERE bankid = $id";
    $conn->query($deleteBank);
}


?>














<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

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
            <!-- logo -->
            <a href="" class="flex items-center font-bold text-blue-950	gap-[7px]">
                <img src="images/CentralLogo.png" alt="" class="md:h-[60px] md:w-[150px] h-[35px] w-[90px]">
                ADMIN
            </a>
            <!-- navigation -->
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


        <div class="flex justify-evenly items-center  w-[85%]">
            <h1 class="text-[50px] h-[10%]  text-center text-black">BANKS</h1>
            <a href="addbank.php" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 border border-blue-600 rounded">ADD BANKS</a>

        </div>

        <section class="min-h-[75vh]  ">


        <table id="dataTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr >
                    <th class=" w-[11%] px-6 py-3 text-center" scope="col" >Logo</th>
                    <th class=" w-[12%] px-6 py-3 text-center"scope="col" >Bank</th>
                    <th class=" w-[12%] px-6 py-3 text-center"scope="col" >ID</th>
                    <th class=" w-[12%] px-6 py-3 text-center" scope="col" >Edit</th>
                    <th class=" w-[12%] px-6 py-3 text-center" scope="col" >Delete</th>
                    <th class=" w-[12%] px-6 py-3 text-center" scope="col" >Agences</th>
                    <th class=" w-[12%] px-6 py-3 text-center" scope="col" >ATM</th>
                </tr>
            </thead>
            <tbody class="h-[2vh] ">
                <?php



                $sql = "SELECT logo, name, bankid FROM bank";
                $result = $conn->query($sql);


                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $id = $row["bankid"];
                        echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                    <td class='px-6 py-4  '><img class='h-[100%] w-[150px]' src='" . $row["logo"] . "' alt=''></td>
                    <td class='px-6 py-4 font-semibold text-center'>" . $row["name"] . "</td>
                    <td class='px-6 py-4 font-semibold text-center'>" . $row["bankid"] . "</td>
                    <td >
                   
                    <form action='addbank.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                    <input type='hidden' name='operation' value='" . $row["bankid"] . "'>
                    <input type='hidden' name='bankid' value='" . $row["bankid"] . "'>
                    <input type='submit'  value='Edit' class='cursor-pointer'>
                    
                    </form>
                

                
                </td>
                
                    <td >
                    <form action='banques.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                        <input type='hidden' name='bankid' value='" . $row["bankid"] . "'>
                        <input type='submit'  name='Deletes' value='Delete' class='cursor-pointer'>
                    </form>
                </td>
                
                    <td >
                        <form action='agences.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900'>
                            <input type='hidden' name='bankid' value='" . $row["bankid"] . "'>
                            <input type='submit'  name='submit' value='Agences' class='cursor-pointer'>
                        </form>
                    </td>
                    <td >
                    <form action='ATM.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900'>
                        <input type='hidden' name='bankid' value='" . $row["bankid"] . "'>
                        <input type='submit'  name='submit' value='ATM' class='cursor-pointer'>
                    </form>
                </td>
                </tr>";
                    }
                } else {
                }
                $conn->close();
                ?>
            </tbody>
        </table>




    </section>
    <footer class="text-center h-[5vh] text-white bg-black flex items-center justify-center">
        <h2>Copyright © 2030 Hashtag Developer. All Rights Reserved</h2>
    </footer>
    <script src="navbar.js">

    </script>

</body>

</html>