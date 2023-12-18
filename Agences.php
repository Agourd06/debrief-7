<?php
@include "DataBase.php";

// handel delete all 
if (isset($_POST['delete_all'])) {
    $deleteAll = "UPDATE agency set is_deleted = TRUE ;";
    if ($conn->query($deleteAll) !== TRUE) {
        echo "Error deleting address: " . $conn->error;
    }
}
if (isset($_POST['reset'])) {
    $deleteAll = "UPDATE agency set is_deleted = FALSE ;";
    if ($conn->query($deleteAll) !== TRUE) {
        echo "Error deleting address: " . $conn->error;
    }
}


// Handle Delete action
if (isset($_POST['deleteagency']) && isset($_POST['delete'])) {
    $id = $_POST['delete'];

    // Delete  in the 'agency' table using soft delete
    $soft_delete = "UPDATE agency set is_deleted = TRUE WHERE agencyId = $id";
    if ($conn->query($soft_delete) !== TRUE) {
        echo "Error deleting address: " . $conn->error;
    }

    // 
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

        <script src="navbar.js">

</script>
        <div class="flex justify-evenly items-center  h-[20vh] ">
            <h1 class="text-[50px]    text-black">AGENCIES</h1>
            <a href="addagency.php" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 border border-blue-600 rounded">ADD AGENCIES</a>

        </div>
        <section class="min-h-[75vh]">

        <?php
        // Check if the 'submit' and 'bankid' are set, indicating that the form is submitted
        if (isset($_POST['submit']) && isset($_POST['bankid'])) {
            $bankid = $conn->real_escape_string($_POST['bankid']);

            // Fetch bank details based on the bankid
            $bank_sql = "SELECT * FROM bank WHERE bankid = '$bankid'";
            $bank_result = $conn->query($bank_sql);

            if ($bank_result->num_rows > 0) {
                $bank_row = $bank_result->fetch_assoc();
                echo "<div class ='flex w-[100%]  justify-center h-[60px]  items-center text-black'>";
                echo "<img class=' w-[15%] h-[100%] flex items-center  justify-center' src='{$bank_row['logo']}' > ";
                echo "<p class=' w-[85%] h-[100%] flex items-center  justify-center'>Bank : {$bank_row["name"]}</p>";
                echo "</div>";
            }

            $sql = "SELECT * FROM `agency` WHERE bankid = '$bankid'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">';
                echo '<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">ID</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Longtitude</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Latitude</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Agency Name</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Bank ID</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Edit</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Delete</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col" ">Users</th>
                        </tr>
                    </thead>';
                while ($row = $result->fetch_assoc()) {
                    
                        
                   

                    echo ' <tbody class="h-[2vh] ">';
                    echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bclass='px-6 py-4 font-semibold text-center'>" . $row["agencyId"] . " </td>
                    <td class='px-6 py-4 font-semibold text-center'>" . $row["agencyId"] . " </td>
                    <td class='px-6 py-4 font-semibold text-center'> " . $row["longitude"] . "</td>
                    <td class='px-6 py-4 font-semibold text-center'> " . $row["latitude"] . " </td>
                    <td class='px-6 py-4 font-semibold text-center'>" . $row["agencyname"] . "</td>
                    <td class='px-6 py-4 font-semibold text-center'>" . $row["bankId"] . "</td>


    
                            <td >
                            <form action='addagency.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                            <input type='hidden'  name='operation' value='" . $row["agencyId"] . "'>
                            <input type='hidden' name='agencyid' value='" . $row["agencyId"] . "'>
                            <input type='submit'   name='editing' value='Edit' class='cursor-pointer'>
                        </form>
                        
                            </td>

                            <td >
                                <form action='agences.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                                    <input type='hidden' name='delete' value='" . $row["agencyId"] . "'>
                                    <input type='submit'  name='deleteagency' value='Delete' class='cursor-pointer'>
                                </form>
                            </td>



                        
                       
                         
                         
                            <td >
                            <form action='users.php' method='post'  class=' cursor-pointer text-center focus:outline-none text-white bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900'>
                                <input type='hidden' name='agencyId' value='" . $row["agencyId"] . "'>
                                <input type='submit'  name='users' value='Show' class='cursor-pointer'>
                            </form>
                        </td>
                        </tr>";
                    
                }
                echo '</table>';
            } else {
                echo "<p class='text-center'>0 results</p>";
            }
        } else {

            $start = 0;
            $rows_per_page = 4;
            
            $record = "SELECT * FROM agency ";
            $result3 = $conn->query($record);
            $num_rows = mysqli_num_rows($result3);
            
            $sqlATM = "SELECT * FROM agency"; // Move the definition here
            
            $pages = ceil($num_rows / $rows_per_page);
            
            if (isset($_GET['page-nr'])) {
                $page = $_GET['page-nr'] - 1;
                $start = $page * $rows_per_page;
            }
            
            $sqlATM .= " LIMIT $start, $rows_per_page"; // Append the LIMIT clause here
            $result2 = $conn->query($sqlATM);
            
           
            // Fetch data for 'compts' table

            $sqlall = "SELECT * FROM `agency` WHERE is_deleted = FALSE LIMIT $start, $rows_per_page";
            $result2 = $conn->query($sqlall);

            if ($result2->num_rows > 0) {
                echo '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">';
                echo '<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">ID</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Longitude</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Latitude</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Agency Name</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Bank ID</th>
                          
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Edit</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Delete</th>
                            <th class=" w-[11%] px-6 py-3 text-center" scope="col">Users</th>
                        </tr>
                    </thead>';
                while ($row = $result2->fetch_assoc()) {

                    echo "<tr>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["agencyId"] . " </td>
                            <td class='px-6 py-4 font-semibold text-center'> " . $row["longitude"] . "</td>
                            <td class='px-6 py-4 font-semibold text-center'> " . $row["latitude"] . " </td>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["agencyname"] . "</td>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["bankId"] . "</td>


                      
                            <td >
                            <form action='addagency.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                            <input type='hidden'  name='operation' value='" . $row["agencyId"] . "'>
                            <input type='hidden' name='agencyid' value='" . $row["agencyId"] . "'>
                            <input type='submit'   name='editing' value='Edit' class='cursor-pointer'>
                        </form>
                        
                            </td>
                            
                            <td >
                            <form action='agences.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                                <input type='hidden' name='delete' value='" . $row["agencyId"] . "'>
                                <input type='submit'  name='deleteagency' value='Delete' class='cursor-pointer'>
                            </form>
                        </td>
                        <td >
                        <form action='users.php' method='post'  class=' cursor-pointer text-center focus:outline-none text-white bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900'>
                            <input type='hidden' name='agencyId' value='" . $row["agencyId"] . "'>
                            <input type='submit'  name='users' value='Show' class='cursor-pointer'>
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

        <form method="post" class="w-[100%] flex justify-center items-center h-[15vh] ">
            <input value="RESET" type="submit" name="reset"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"></input >
        </form>
        <div class="flex justify-center items-center mt-10">

<nav aria-label="Page navigation example">
    <ul class="inline-flex -space-x-px">
        <li>

            <a href="?page-nr=1"
                class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 ml-0 rounded-l-lg leading-tight py-2 px-3 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>


            </li>
        <li>
            <?php for($counter = 1; $counter <= $pages ; $counter++)  {?>
            <a href="?page-nr=<?=$counter;?>"
                class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 leading-tight py-2 px-3 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $counter;?></a>
       <?php  } ?>
            </li>

        <li>
            <a href="?page-nr=<?=$pages ?>"
                class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg leading-tight py-2 px-3 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
        </li>
    </ul>
</nav>


</div>

    </section>

    <footer class="text-center h-[5vh] text-white bg-black flex items-center justify-center">
        <h2>Copyright © 2030 Hashtag Developer. All Rights Reserved</h2>
    </footer>
    

</body>

</html>