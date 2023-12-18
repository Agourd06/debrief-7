
<?php
session_start();

include "../DataBase.php";




$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

            // Check if the 'submit' and 'bankid' are set, indicating that the form is submitted
            if (isset($_POST['users']) && isset($_POST['agencyId'])) {
                $agencyid = $conn->real_escape_string($_POST['agencyId']);


                // Fetch bank details based on the bankid
                $agency_sql = "SELECT * FROM agency WHERE agencyid = '$agencyid'";
                $agency_result = $conn->query($agency_sql);

                if ($agency_result->num_rows > 0) {
                    $agency_row = $agency_result->fetch_assoc();
                    echo "<div class ='flex w-[100%]  justify-center h-[60px]  items-center text-black'>";

                    echo "<p class=' w-[50%] h-[100%] flex items-center  justify-center'>Agence : {$agency_row["agencyname"]}</p>";
                    echo "</div>";
                }

                // Fetch data based on the selected bankid for 'agency'
                $sql = "SELECT users.userid, users.firstName, users.familyName, users.username, agency.agencyid
                FROM users
                INNER JOIN adress ON users.userid = adress.userid
                INNER JOIN agency ON adress.agencyid = agency.agencyid
                WHERE agency.agencyid = '$agencyid' AND users.username LIKE '%$searchTerm%' ORDER BY username ASC";
        




                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    
                 
                    echo '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">';
                    echo '<thead class="text-xs text-gray-700 upperclass=" w-[11%] px-6 py-3 text-center" scope="col"                    <tr>
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">User Name</th>
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">First Name</th>
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">Family Name</th>
                            
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">Editing</th>
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">Deleting</th>
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">Accounts</th>
                            </tr>
                        </thead>';
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr> 
                                <td class='px-6 py-4 font-semibold text-center'>" . $row["username"] . " </td>
                                <td class='px-6 py-4 font-semibold text-center'> " . $row["firstName"] . "</td>
                                <td class='px-6 py-4 font-semibold text-center'>" . $row["familyName"] . "</td>
                            
                                
                        
                        
                            
                            <td >
                                <form action='registre.php' method='post'  class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                                <input type='hidden' name='operation' value='" . $row["userid"] . "'>
                                <input type='hidden' name='userid' value='" . $row["userid"] . "'>
                                <input type='submit'  name='editing' value='Edit' class=' cursor-pointer'>
                            </form>
                            
        
                            
                                </td>
                            <td >
                            <form action='users.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                            <input type='hidden' name='userid' value='" . $row["userid"] . "'>
                            <input type='submit'  name='deleteuser' value='Delete' class=' cursor-pointer'>
                        </form>
                        
                                </td>
                                <td >
                                <form action='accounts.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900'>
                                    <input type='hidden' name='userid' value='" . $row["userid"] . "'>
                                    <input type='submit'  name='submit' value='Show' class=' cursor-pointer'>
                                </form>
                            </td> 
                            </tr>";
                    }
                    echo '</table>';
                } else {
                    echo "<p class='text-center'>0 results</p>";
                }
            } else {
            
            
                $sqlATM = "SELECT * FROM users WHERE username LIKE '%$searchTerm%' ORDER BY username ASC";
                $result2 = $conn->query($sqlATM);

                if ($result2->num_rows > 0) {
                    echo '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">';
                    echo '<thead class="text-xs text-gray-700 upperclass=" w-[11%] px-6 py-3 text-center" scope="col"                    <tr>
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">User Name</th>
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">First Name</th>
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">Family Name</th>
                            
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">Editing</th>
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">Deleting</th>
                                <th class=" w-[11%] px-6 py-3 text-center" scope="col">Accounts</th>
                            </tr>
                        </thead>';
                    while ($row = $result2->fetch_assoc()) {
                        echo ' <tbody class="h-[2vh] ">';

                        echo "<tr>
                        <td class='px-6 py-4 font-semibold text-center'>" . $row["username"] . " </td>
                        <td class='px-6 py-4 font-semibold text-center'> " . $row["firstName"] . "</td>
                        <td class='px-6 py-4 font-semibold text-center'>" . $row["familyName"] . "</td>


                        
                             <td >
                                <form action='registre.php' method='post'  class=' cursor-pointer text-center focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900'>
                                <input type='hidden' name='operation' value='" . $row["userId"] . "'>
                                <input type='hidden' name='userid' value='" . $row["userId"] . "'>
                                <input type='submit'  name='editing' value='Edit' class=' cursor-pointer'>
                            </form>
                            
        
                            
                                </td>
                                <td >
                                <form action='users.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>
                                <input type='hidden' name='userid' value='" . $row["userId"] . "'>
                                <input type='submit'  name='deleteuser' value='Delete' class=' cursor-pointer'>
                            </form>
                            
                                    </td>
                            <td >
                            <form action='accounts.php' method='post' class=' cursor-pointer text-center focus:outline-none text-white bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900'>
                                <input type='hidden' name='userid' value='" . $row["userId"] . "'>
                                <input type='submit'  name='submit' value='Show' class=' cursor-pointer'>
                            </form>
                        </td> 
                            </tr>";
                    }
                    echo '</table>
                    ';
                } else {
                    echo "<p class='text-center'>0 results</p>";
                }
            }
            $conn->close();
            ?>
            