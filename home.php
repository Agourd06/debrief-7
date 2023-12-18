<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIH BANK</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .carousel-container {
            width: 100%;
            height: 70vh;
            overflow: hidden;
            position: relative;
        }

        .carousel-wrapper {
            display: flex;
            transition: transform 5s ease-in-out;
            animation: slide 20s infinite alternate;
            /* Pour l'animation automatique */
        }

        .carousel-item {
            width: 100%;
            flex: 0 0 auto;
            height: 70vh;
            background-size: cover;
            background-position: center;
        }

        @keyframes slide {

            0%,
            100% {
                transform: translateX(0);
            }

            33.33% {
                transform: translateX(-100%);
            }

            66.66% {
                transform: translateX(-200%);
            }
        }

        .faq {
            padding: 3em 0;
            background-color: #EDEDED;
            text-align: center;
        }

        .faqq {
            width: 60%;
            margin-top: 2em;
            padding-bottom: 1em;
            border-bottom: 2px solid black;
            cursor: pointer;
        }

        .faqq .question {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .faqq .reponse {
            max-height: 0;
            overflow: hidden;
            transition: max-height 1s ease, opacity 1s ease;
        }

        .faqq.activeee .reponse {
            max-height: 1000px;
            opacity: 1;
        }

        .faqq button.toggle {
            background-color: transparent;
            border: none;
            font-size: 20px;
        }
        .carousel-content {
            width: 100vw;
            height: 70vh;
            position: absolute;
            top: 19%;
            left: 49%;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: end;
            align-items: center;
            gap: 30vh;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <?php
    session_start();
   
    ?>

<header class="header sticky w-[100%] h-[10vh] top-0 bg-white shadow-md flex items-center justify-between px-8 py-02 z-50 	">
        <!-- logo -->
        <a href="">
            <img src="images/cihlogo.png" alt="" class="md:h-[50px] md:w-[140px] h-[35px] w-[90px]">

        </a>
        <!-- navigation -->
        <nav class="nav font-semibold w-[100%] text-lg">
            <ul class="flex items-center w-[100%] justify-center  ">
                <li class="p-4 border-b-2 border-blue-500 border-opacity-0 hover:border-opacity-100 hover:text-blue-500 duration-200 cursor-pointer active">
                    <a href="#">Home</a>
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
                    <a href="ContactUs.php">Contact</a>
                </li>
                <li class="p-4 border-b-2 border-red-500 border-opacity-0 hover:border-opacity-100 hover:text-red-500 duration-200 cursor-pointer">
                    <a href="index.php" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Log Out</a>
                </li>
            </ul>
        </nav>

    </header>

    <section class="carousel-container">
        <div class="carousel-wrapper">
            <div class="carousel-item bg-black" style="background: url('images/pic1.jpg'); "></div>
            <div class="carousel-item " style="background-image: url('images/pic2.jpg');"></div>
            <div class="carousel-item " style="background-image: url('images/pic3.jpg');"></div>    
        </div>
      
    </section>

    <section class="bg-slate-100 bg-cover h-[70vh] flex items-center justify-around">

        <div class="text-center flex flex-col items-center gap-4"><svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 -960 960 960" width="50"><path d="m438-338 226-226-57-57-169 169-84-84-57 57 141 141Zm42 258q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z"/></svg>
            <h1 class="font-bold">
            Notification de Sécurité 
            </h1>
            <p> Votre sécurité est notre priorité, Assurez-vous d'utiliser<br> des mots de passe forts et de ne jamais partager vos <br>informations personnelles.
                 Consultez notre section de sécurité<br> pour en savoir plus sur les mesures que nous prenons<br> pour protéger vos comptes</p>
        </div>
        <div class=" text-center flex h-[100%] flex-col items-center gap-[65px] pt-[25px]">
        <a href="clients.php" class="text-white w-[200px] h-[50px] font-bold bg-gradient-to-r from-cyan-400 to-orange-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800  rounded-lg text-sm px-5 py-2.5 flex items-center text-center me-2 mb-2">Consulter Mes Données</a>
            <div class=" text-center flex  flex-col items-center gap-4" >
            <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 -960 960 960" width="50"><path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z"/></svg>
            <h1 class="font-bold">Welcome to chez CIH BANK!</h1>
            <p>Nous sommes ravis de vous accueillir. Explorez nos <br> services bancaires en ligne et
                 découvrez comment nous pouvons<br>  simplifier votre gestion financière.</p>
                </div>
        </div>
        <div class="text-center flex flex-col items-center gap-4"> <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 -960 960 960" width="50"><path d="M480-120q-75 0-140.5-28.5t-114-77q-48.5-48.5-77-114T120-480q0-75 28.5-140.5t77-114q48.5-48.5 114-77T480-840q82 0 155.5 35T760-706v-94h80v240H600v-80h110q-41-56-101-88t-129-32q-117 0-198.5 81.5T200-480q0 117 81.5 198.5T480-200q105 0 183.5-68T756-440h82q-15 137-117.5 228.5T480-120Zm112-192L440-464v-216h80v184l128 128-56 56Z"/></svg>
            <h1 class="font-bold">
            Mises à Jour et Nouveautés</h1>
            <p>Restez informé! Consultez notre page d'accueil régulièrement<br>  pour les dernières mises à jour, promotions et nouveautés. Nous <br> travaillons constamment pour améliorer votre<br>  expérience bancaire</p>
        </div>
    </section>
    <section class="h-[90vh]">
        
        <div class=" flex items-center justify-between">
            <div class=" pr-8">
            <h1 class=" text-3xl font-bold">&emsp;&ensp;"Banking Brilliance:<br>&emsp;&ensp;Experience the Exceptional Services of CIH Bank<br>&emsp;&ensp;Innovation Hub"
</h1>
<p>&emsp;&emsp; Immerse yourself in a world where every transaction is a commitment, every financial move <br>
 &emsp;&emsp;is a strategic step towards your goals. At CIH Bank, we invite you to discover<br>
&emsp;&emsp; exceptional financial services crafted to reveal the brilliance of <br>
&emsp;&emsp; your financial landscape. Welcome to our banking kingdom, where excellence grows<br>
&emsp;&emsp; at every step of your financial journey. Our dedicated team of banking<br>
&emsp;&emsp; experts is here to guide you, from the meticulous management of your accounts to the<br>
&emsp;&emsp; creation of a financial plan that tells your story. Secure investments, innovative solutions,<br>
 &emsp;&emsp;each service has been carefully chosen to enhance your financial world. Let our<br>
&emsp;&emsp; tailor-made banking services transform your financial dreams into reality. Unique <br>
&emsp;&emsp; strategies that captivate, financial solutions that enchant – that's our promise.</p>
            </div>

            
            <div>
                <img class="h-[70vh]" src="./images/picture1.jpg" alt="">
            </div>
        </div>
    </section>


    <section class="h-[90vh]">
        
        <div class=" flex items-center justify-between">
            <div>
                <img class="h-[70vh]" src="./images/picture2.jpg" alt="">
            </div>
            <div class=" pr-8">
            <h1 class=" text-3xl font-bold mr-[6rem]">"CIH Bank: Nurturing Legacy, Unveiling <br>Excellence"</h1><br>
Plunge into the rich history of CIH Bank, a journey deeply rooted in<br>
familial devotion. For generations, our dedication to financial excellence has<br>
flourished, with each transaction carrying the legacy of our financial heritage. Our<br>
modest beginnings were valuable lessons, gradually cultivating a portfolio of<br>
innovative financial solutions. Our reputation soared, attracting clients from across<br>
the globe. The dawn of the new millennium ushered in an era of bespoke banking<br>
services, transforming ordinary financial spaces into extraordinary havens. Today,<br>
CIH Bank evolves with an unwavering commitment, celebrating the continual<br>
flourishing of financial prosperity and excellence. Immerse yourself in this financial<br>
narrative, where each transaction contributes to the living legacy of CIH Bank.<br>
CIH Bank evolves with an unwavering commitment, celebrating the continual<br>
flourishing of financial prosperity and excellence. Immerse yourself in this financial<br>
narrative, where each transaction contributes to the living legacy of CIH Bank.</p>






            </div>

        </div>
    </section>


    </section>

    <section>
        <h1 class="mb-4 text-5xl font-extrabold leading-none tracking-tight text-center py-8">Satisfied customers</h1>
        <div class=" flex justify-evenly">
            <div class=" h-[52vh] w-[24vw] bg-gradient-to-b  from-gray-100 to-gray-300  rounded-md shadow-md text-center">
                <img class="rounded-full h-[28vh] w-[14vw] mx-auto p-2" src="./images/salma.png" alt="feedback">
                <p class="font-light	w-[85%] m-auto ">"The CIH bank has proven to be an exceptionally convenient choice for my banking needs, and the team has been incredibly friendly and helpful. and I won't hesitate to use their services again in the future. Thank you, CIH"</p>
                <p class="font-bold text-orange-500">Salma M.</p>
            </div>
            <div class="h-[52vh] w-[24vw] bg-gradient-to-b from-gray-100 to-gray-300  rounded-md shadow-md text-center">
                <img class="rounded-full h-[28vh] w-[14vw] mx-auto p-2" src="./images/adam.png" alt="feedback">
                <p class="font-light	w-[85%] m-auto ">"The CIH bank has proven to be an exceptionally convenient choice for my banking needs, and the team has been incredibly friendly and helpful. and I won't hesitate to use their services again in the future. Thank you, CIH"</p>
                <p class="font-bold text-orange-500">Adam L.</p>
            </div>
            <div class="h-[52vh] w-[24vw] bg-gradient-to-b  from-gray-100 to-gray-300  rounded-md shadow-md text-center">
                <img class="rounded-full h-[28vh] w-[14vw] mx-auto p-2" src="./images/salim.png" alt="feedback">
                <p class="font-light	w-[85%] m-auto ">"The CIH bank has proven to be an exceptionally convenient choice for my banking needs, and the team has been incredibly friendly and helpful. and I won't hesitate to use their services again in the future. Thank you, CIH"</p>
                <p class="font-bold text-orange-500">Salim G.</p>
            </div>
        </div>
    </section>

    <section class="py-16 max-w-full ">
        <div class="bg-blue-400 h-64 items-center ">
            <div class="flex justify-around text-white font-bold text-2xl text-center  ">
                <div>
                    <p class="my-16">30</p>
                    <p>Ans d'experience</p>
                </div>
                <div>
                    <p class="my-16">1024</p>
                    <p>total de voitures</p>
                </div>
                <div>
                    <p class="my-16">2389</p>
                    <p>Client satisfait</p>
                </div>
                <div>
                    <p class="my-16">1024</p>
                    <p>total des locaux</p>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="faq">
            <h1 class="mb-4 text-5xl font-extrabold leading-none tracking-tight text-center py-4 ">Frequently Asked
                Questions</h1>
            <div class="faqq mx-auto">
                <div class="question">How can I open a bank account with CIH?

<button class="toggle">+</button></div>
                <div class="reponse text-gray-500"> To open a bank account with CIH, you can visit one of our branches with a valid ID, proof of address, and other required documents. Our agents will be happy to guide you through the process.</div>
            </div>
            <div class="faqq mx-auto">
                <div class="question">What are the benefits of having a savings account with CIH?<button
                        class="toggle">+</button></div>
                <div class="reponse text-gray-500"> CIH savings accounts offer competitive interest rates and flexible options. You also get easy access to your funds, secure online management, and various benefits through our loyalty program.</div>
            </div>
            <div class="faqq mx-auto">
                <div class="question">How can I access my account statements online?<button class="toggle">+</button>
                </div>
                <div class="reponse text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum
                    itaque facere amet
                    earum necessitatibus? Fugiat, minima? Alias, maxime ratione vero velit laudantium fuga illo eius qui
                    quibusdam iure soluta perspiciatis.</div>
            </div>
            <div class="faqq mx-auto">
                <div class="question">What real estate financing options does CIH offer?<button
                        class="toggle">+</button></div>
                <div class="reponse text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam
                    corporis, in cumque
                    cum minima ratione quos eum eaque possimus, porro adipisci nam numquam deserunt consequuntur
                    veritatis enim unde esse consectetur.</div>
            </div>
            <div class="faqq mx-auto">
                <div class="question">How do I report a lost or stolen credit card?<button
                        class="toggle">+</button></div>
                <div class="reponse text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                    ullam in
                    suscipit! Id, sint nostrum consectetur est non maxime, qui fugiat eum doloremque architecto libero
                    quaerat vitae, voluptas velit hic.</div>
            </div>
            <div class="faqq mx-auto">
                <div class="question">What online banking services are available at CIH?<button
                        class="toggle">+</button></div>
                <div class="reponse text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque,
                    quaerat enim unde
                    quis qui odio optio eos culpa dolor dicta doloremque amet perferendis nihil mollitia atque veniam
                    modi ea sequi.</div>
            </div>
        </div>
    </section>



    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

        <footer class="bg-gray-900 h-[15vh]  shadow sm:flex sm:items-center sm:justify-between p-4 sm:p-6 xl:p-8 dark:bg-gray-800 antialiased">
  <p class="mb-4 text-sm text-center text-gray-500 dark:text-gray-400 sm:mb-0">
      &copy; 2023-2024 <a href="https://flowbite.com/" class="hover:underline" target="_blank">Flowbite.com</a>. All rights reserved.
  </p>
  <div class="flex justify-center items-center space-x-1">
    <a href="#" data-tooltip-target="tooltip-facebook" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
        </svg>
        <span class="sr-only">Facebook</span>
    </a>
    <div id="tooltip-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
        Like us on Facebook
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <a href="#" data-tooltip-target="tooltip-twitter" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path fill="currentColor" d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z"/>
        </svg>
        <span class="sr-only">Twitter</span>
    </a>
    <div id="tooltip-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
        Follow us on Twitter
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <a href="#" data-tooltip-target="tooltip-github" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
   <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" fill="gray" width="21px" height="21px">    <path d="M 9.9980469 3 C 6.1390469 3 3 6.1419531 3 10.001953 L 3 20.001953 C 3 23.860953 6.1419531 27 10.001953 27 L 20.001953 27 C 23.860953 27 27 23.858047 27 19.998047 L 27 9.9980469 C 27 6.1390469 23.858047 3 19.998047 3 L 9.9980469 3 z M 22 7 C 22.552 7 23 7.448 23 8 C 23 8.552 22.552 9 22 9 C 21.448 9 21 8.552 21 8 C 21 7.448 21.448 7 22 7 z M 15 9 C 18.309 9 21 11.691 21 15 C 21 18.309 18.309 21 15 21 C 11.691 21 9 18.309 9 15 C 9 11.691 11.691 9 15 9 z M 15 11 A 4 4 0 0 0 11 15 A 4 4 0 0 0 15 19 A 4 4 0 0 0 19 15 A 4 4 0 0 0 15 11 z"/></svg>
        <span class="sr-only">instagram</span>
    </a>
   
  
 
</div>
</footer>

    <script src="main.js">

    </script>

</body>

</html>