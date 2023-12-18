<?php

@include "../DataBase.php";




$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';


if (isset($_POST['submit']) && isset($_POST['accountid'])) {
            $accountid = $conn->real_escape_string($_POST['accountid']);

            // Fetch bank details based on the bankid
            $account_sql = "SELECT * FROM account WHERE accountid = '$accountid'";
            $account_result = $conn->query($account_sql);

            if ($account_result->num_rows > 0) {
                $account_row = $account_result->fetch_assoc();
                echo "<div class ='flex w-[100%]  justify-center h-[60px]  items-center text-black'>";
                echo "<p class=' w-[85%] h-[100%] flex items-center font-semibold  justify-center'>RIB : {$account_row["RIB"]}</p>";
                echo "<p class=' w-[85%] h-[100%] flex items-center font-semibold  justify-center'>balance : {$account_row["balance"]} MAD</p>";
                echo "</div>";
            }


            // Fetch data based on the selected bankid for 'agency'
            $sql = "SELECT * FROM `transaction` WHERE accountid = '$accountid' AND trans_type LIKE '%$searchTerm%' ORDER BY transactionId DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">';
                    echo '<thead class="text-xs text-gray-700 upperclass=" w-[11%] px-6 py-3 text-center" scope="col" 
                        <tr>

                            <th class="w-[11%] px-6 py-3 text-center" scope="col">ID</th>
                            <th class="w-[11%] px-6 py-3 text-center" scope="col">Operation Type</th>
                            <th class="w-[11%] px-6 py-3 text-center" scope="col">Amount</th>
                            <th class="w-[11%] px-6 py-3 text-center" scope="col">Edit</th>
                            <th class="w-[11%] px-6 py-3 text-center" scope="col">Delete</th>

                        </tr>
                    </thead>';
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["transactionId"] . " </td>
                            <td class='px-6 py-4 font-semibold text-center'>" . $row["trans_type"] . "  </td>
                            <td class='px-6 py-4 font-semibold text-center'> " . $row["amount"] . " MAD</td>


                         
                               

                            <td >
                            <form action='addtransactions.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                            <input type='hidden' name='operation' value='" . $row["transactionId"] . "'>
                            <input type='hidden' name='transactionId' value='" . $row["transactionId"] . "'>
                            <input type='submit'  name='editing' value='Edit'  class=' cursor-pointer'>
                        </form>
                        
                            </td>
                            <td >
                            <form action='transactions.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                                <input type='hidden' name='delete' value='" . $row["transactionId"] . "'>
                                <input type='submit'  name='deletetransaction' value='Delete' class=' cursor-pointer'>
                            </form>
                        </td>
                        </tr>";
                }
                echo '</table>';
            } else {
                echo "<p class='text-center'>0 results</p>";
            }
        } else {
            // Handle the case when 'submit' and 'bankid' are not set (initial page load)
            // Fetch data for 'compts' table
            $sqlall = "SELECT * FROM `transaction` WHERE trans_type LIKE '%$searchTerm%' ORDER BY transactionId DESC";
            $result2 = $conn->query($sqlall);

            if ($result2->num_rows > 0) {
              
                echo '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">';
                echo '<thead class="text-xs text-gray-700 upperclass=" w-[11%] px-6 py-3 text-center" scope="col" 
                    <tr>
                        <th class="w-[11%] px-6 py-3 text-center" scope="col">ID</th>
                        <th class="w-[11%] px-6 py-3 text-center" scope="col">Operation Type</th>
                        <th class="w-[11%] px-6 py-3 text-center" scope="col">Amount</th>
                        <th class="w-[11%] px-6 py-3 text-center" scope="col">Edit</th>
                        <th class="w-[11%] px-6 py-3 text-center" scope="col">Delete</th>
                    </tr>
                </thead>';
                while ($row = $result2->fetch_assoc()) {

                    echo "<tr>
                    <td class='px-6 py-4 font-semibold text-center'>" . $row["transactionId"] . " </td>
                    <td class='px-6 py-4 font-semibold text-center'>" . $row["trans_type"] . "  </td>
                    <td class='px-6 py-4 font-semibold text-center'> " . $row["amount"] . " MAD</td>

                 
                       

                    <td >
                    <form action='addtransactions.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                    <input type='hidden' name='operation' value='" . $row["transactionId"] . "'>
                    <input type='hidden' name='transactionId' value='" . $row["transactionId"] . "'>
                    <input type='submit'  name='editing' value='Edit'  class=' cursor-pointer'>
                </form>
                
                    </td>
                    <td >
                    <form action='transactions.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                        <input type='hidden' name='delete' value='" . $row["transactionId"] . "'>
                        <input type='submit'  name='deletetransaction' value='Delete' class=' cursor-pointer'>
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