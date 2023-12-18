<?php
session_start();
@include "DataBase.php";



$userData = array();

if (isset($_SESSION['user_id'])) {
    $userData = $_SESSION['user_id'];
}
$userData1 = array();

if (isset($_SESSION['username'])) {
    $userData1 = $_SESSION['username'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Clients Page</title>
    <style>
        .texto {
            font-family: 'Playfair Display', serif;
        }
        .bg {
            background: #f2f2f2;
        }
    </style>
</head>

<body>


    <header class="header sticky w-[100%] h-[8vh] top-0 bg-white shadow-md flex items-center justify-between px-8 py-02 z-50 	">
        <!-- logo -->
        <a href="">
            <img src="images/cihlogo.png" alt="" class="md:h-[50px] md:w-[140px] h-[35px] w-[90px]">

        </a>
        <!-- navigation -->
        <nav class="nav font-semibold w-[100%] text-lg">
            <ul class="flex items-center w-[100%] justify-center  ">
                <li class="p-4 border-b-2 border-blue-500 border-opacity-0 hover:border-opacity-100 hover:text-blue-500 duration-200 cursor-pointer active">
                    <a href="home.php">Home</a>
                </li>
           

                <li class="p-4 border-b-2 outline-none border-blue-500 border-opacity-0 hover:border-opacity-100 hover:text-blue-500 duration-200 cursor-pointer">
                    <select name="clients" id="clientSelect" class="border-none outline-none rounded">
                        <option class="font-semibold text-lg outline-none" value="client">Operations</option>

                        <option class="font-semibold text-lg outline-none" value="clientinfo">My infos</option>
                        <option class="font-semibold text-lg outline-none" value="clientaccounts">My accounts</option>
                        <option class="font-semibold text-lg outline-none" value="clienttransactions">My Transactions</option>
                    </select>
                </li>
                <li class="p-4 border-b-2 border-blue-500 border-opacity-0 hover:border-opacity-100 hover:text-blue-500 duration-200 cursor-pointer">
                    <a href="">Contact</a>
                </li>
                <li class="p-4 border-b-2 border-blue-500 border-opacity-0 hover:border-opacity-100 hover:text-blue-500 duration-200 cursor-pointer">
                    <a href="index.php" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 border border-blue-600 rounded">Log Out</a>
                    </li>
            </ul>
        </nav>

    </header>
    <section class = 'bg h-[92vh]'>
        <div class=' texto w-[30vw] h-[20vh] flex flex-row justify-center items-center gap-[10px]'>
            <h1 class="text-[30px] font-bold">WELCOM : </h1>
            <p class="text-[30px] font-bold"> <?php echo $userData1; ?> !</p>
        </div>
        <section class="h-[20vh] flex items-center w-[100%] ">
            <div class="relative overflow-x-auto w-[100%] shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Your Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                First Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Family Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                My Accounts
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php



                        $sql = "SELECT * FROM `users` WHERE userId = '$userData'";
                        $result = $conn->query($sql);


                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $id = $row["userId"];
                                echo '
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                ' . $row['userId'] . '
                </th>
                <td class="px-6 py-4">
                ' . $row['username'] . '
                </td>
                <td class="px-6 py-4">
                ' . $row['firstName'] . '
                </td>
                <td class="px-6 py-4">
                ' . $row['familyName'] . '
                </td>
                <td class="px-6 py-4">
                    <a href="comptsclient.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                </td>
                
            </tr>';
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </section>
    </section>
    <script src="main.js">

    </script>
</body>

</html>