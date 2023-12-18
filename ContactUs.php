
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>O.Agourd Portfolio Contact</title>
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
                <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer active">
                    <a href="home.php">Home</a>
                </li>
           

                <li class="p-4 border-b-2 outline-none border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
                    <select name="clients" id="clientSelect" class="border-none outline-none rounded">
                        <option class="font-semibold text-lg" value="client">Operations</option>

                        <option class="font-semibold text-lg" value="clientinfo">My infos</option>
                        <option class="font-semibold text-lg" value="clientaccounts">My accounts</option>
                        <option class="font-semibold text-lg" value="clienttransactions">My Transactions</option>
                    </select>
                </li>
                <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
                    <a href="">Contact</a>
                </li>
            </ul>
        </nav>

    </header>

    <div class="text-[50px] text-gray-700 text-center">Contact Me</div>
    <section class="min-h-[70vh] flex items-center justify-center">
    
    
    <form class=" w-4/5 lg:w-1/2 bg-white text-gray-700 opacity-60 p-10  rounded-3xl">
        <div class="grid md:grid-cols-2 md:gap-6 ">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="floating_first_name" id="floating_first_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="floating_first_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prenom</label>
                <p id="errorMessage" class="text-red-500 text-[14px] hidden">Prenom invalide</p>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="floating_last_name" id="floating_last_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="floating_last_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
                <p id="errormessage2" class="text-red-500 text-[14px] hidden">Nom invalide</p>
            </div>
        </div>
    
        <div class="relative z-0 w-full mb-6 group">
            <input type="email" name="repeat_password" id="floating_repeat_email"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="floating_repeat_email"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">E-mail</label>
            <p id="errormessage3" class="text-red-500 text-[14px] hidden">E-mail invalide</p>
        </div>
    
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="tel" name="floating_phone" id="floating_phone"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="floating_phone"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tél
                    (06 xx xx xx xx)</label>
                <p id="errormessage4" class="text-red-500 text-[14px] hidden">Télephone invalide</p>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="floating_company" id="floating_company"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="floating_company"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company
                    (Ex. Google)</label>
            </div>
        </div>
   
      
    
        <button type="submit"
            class="text-white bg-black hover:bg-white hover:text-black border-[3px] border-white-900 hover:bg-gray  border-solid     font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   ">Submit</button>
    </form>
</section>

<script src="regex.js"></script>
<script src="main.js"></script>

</body>
</html>


