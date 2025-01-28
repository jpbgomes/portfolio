<x-app-layout>
    <x-full-container class="overflow-y-visible pt-10">
        <x-container class="flex flex-col items-center">
            <x-title>a <span class="text-white">developer</span> who works to get the <span class="text-white">best out of
                    people.</span></x-title>

            <x-cbutton class="bg-white my-14 text-sm font-medium" href="mailto:{{ env('MAIL_FOR_BACKUP') }}">Reach Out</x-cbutton>

            <div class="flex flex-wrap items-center justify-center gap-5 mb-14">
                <a target="_blank"
                    class="flex items-center justify-center transition-all hover:bg-neutral-800 px-2 py-1 gap-2 bg-lightblack text-white rounded-xl text-sm"
                    href="https://github.com/jpbgomes">
                    <img src="socials/github.png" alt="" class="w-6 h-6">@jpbgomes
                </a>

                <a target="_blank"
                    class="flex items-center justify-center transition-all hover:bg-neutral-800 px-2 py-1 gap-2 bg-lightblack text-white rounded-xl text-sm"
                    href="https://www.linkedin.com/in/jpbgomes">
                    <img src="socials/linkedin.png" alt="" class="w-6 h-6">@jpbgomes
                </a>

                <a target="_blank"
                    class="flex items-center justify-center transition-all hover:bg-neutral-800 px-2 py-1 gap-2 bg-lightblack text-white rounded-xl text-sm"
                    href="https://www.youtube.com/@jpbgomess">
                    <img src="socials/youtube.png" alt="" class="w-6 h-6">@jpbgomess
                </a>
            </div>

            <div class="w-full flex flex-col items-center gap-3">
                <div
                    class="w-full bg-lightblack flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-10 p-3 rounded-lg">
                    <div class="flex items-center gap-5">
                        <img src="works/nortada.png" alt="Nortada de Sabores" class="w-[60px]">

                        <div>
                            <h1 class="text-white">Nortada de Sabores</h1>
                            <p class="text-neutral-400 mb-2">
                                Restaurant with booking and fully managed by staff.
                                <br>
                                <strong>Laravel and MariaDB</strong>
                            </p>
                        </div>
                    </div>

                    <div>
                        <x-cbutton
                            class="flex items-center gap-2 border border-neutral-500 text-neutral-200 hover:bg-neutral-700 text-sm"
                            href="https://nortadadesabores.com" target="_blank">Learn More <i
                                class="fa-solid fa-utensils"></i></x-cbutton>
                    </div>
                </div>

                <div
                    class="w-full bg-lightblack flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-10 p-3 rounded-lg">
                    <div class="flex items-center gap-5">
                        <img src="works/amaisterapia.png" alt="A + Terapia" class="w-[60px]">

                        <div>
                            <h1 class="text-white">A + Terapia</h1>
                            <p class="text-neutral-400 mb-2">
                                Massages clinic system with client database and outreach.
                                <br>
                                <strong>Laravel and MariaDB</strong>
                            </p>
                        </div>
                    </div>

                    <div>
                        <x-cbutton
                            class="flex items-center gap-2 border border-neutral-500 text-neutral-200 hover:bg-neutral-700 text-sm"
                            href="https://amaisterapia.com" target="_blank">Check It Out
                            <i class="fa-solid fa-spa"></i></x-cbutton>
                    </div>
                </div>

                <div
                    class="w-full bg-lightblack flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-10 p-3 rounded-lg">
                    <div class="flex items-center gap-5">
                        <img src="works/creationcare.webp" alt="Creation Care LLC" class="w-[60px]">

                        <div>
                            <h1 class="text-white">Creation Care LLC</h1>
                            <p class="text-neutral-400 mb-2">
                                House cleaning website with a form to "Free Quote"
                                <br>
                                <strong>Wordpress and Elementor</strong>
                            </p>
                        </div>
                    </div>

                    <div>
                        <x-cbutton
                            class="flex items-center gap-2 border border-neutral-500 text-neutral-200 hover:bg-neutral-700 text-sm"
                            href="https://creationcarellc.com" target="_blank">Clean Your Home
                            <i class="fa-solid fa-home"></i></x-cbutton>
                    </div>
                </div>

                <div
                    class="w-full bg-lightblack flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-10 p-3 rounded-lg">
                    <div class="flex items-center gap-5">
                        <img src="works/norticolor.png" alt="Norticolor" class="w-[60px]">

                        <div>
                            <h1 class="text-white">Norticolor</h1>
                            <p class="text-neutral-400 mb-2">
                                Photography Studio landing page.
                                <br>
                                <strong>TailwindCSS</strong>
                            </p>
                        </div>
                    </div>

                    <div>
                        <x-cbutton
                            class="flex items-center gap-2 border border-neutral-500 text-neutral-200 hover:bg-neutral-700 text-sm"
                            href="https://norticolor.com" target="_blank">See Albuns
                            <i class="fa-solid fa-camera"></i></x-cbutton>
                    </div>
                </div>

                <div
                    class="w-full bg-lightblack flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-10 p-3 rounded-lg">
                    <div class="flex items-center gap-5">
                        <img src="works/skypeople.png" alt="Sky People" class="w-[60px]">

                        <div>
                            <h1 class="text-white">Sky People</h1>
                            <p class="text-neutral-400 mb-2">
                                Mobile Telecom landing page for convertions.
                                <br>
                                <strong>TailwindCSS</strong>
                            </p>
                        </div>
                    </div>

                    <div>
                        <x-cbutton
                            class="flex items-center gap-2 border border-neutral-500 text-neutral-200 hover:bg-neutral-700 text-sm"
                            href="https://skypeople.pt" target="_blank">Explore Areas
                            <i class="fa-solid fa-wifi"></i></x-cbutton>
                    </div>
                </div>
            </div>
        </x-container>

        <x-container class="flex flex-col items-center mt-52">
            <x-title>my <span class="text-white">path</span> into the <span class="text-white">tech and business</span>
                world.</x-title>

            <div class="flex justify-between items-center gap-4 sm:gap-10 h-[1220px] sm:h-[1000px] mt-20">
                <div class="h-full w-full flex flex-col items-center justify-start gap-10">
                    <div
                        class="w-full flex flex-col items-start justify-center gap-5 sm:gap-3 bg-neutral-800 p-3 sm:p-5 rounded-lg h-40">
                        <h2 class="text-start text-2xl text-white">Age 6</h2>
                        <h1 class="text-start text-md text-neutral-200">First Interaction with a Computer</h1>
                    </div>

                    <div
                        class="w-full flex flex-col items-start justify-center gap-5 sm:gap-3 bg-neutral-800 p-3 sm:p-5 rounded-lg h-60 sm:h-40 mt-28">
                        <h2 class="text-start text-2xl text-white">Age 14</h2>
                        <h1 class="text-start text-md text-neutral-200">Started Programming in .Lua for FiveM</h1>
                    </div>

                    <div
                        class="w-full flex flex-col items-start justify-center gap-5 sm:gap-3 bg-neutral-800 p-3 sm:p-5 rounded-lg h-60 sm:h-40 mt-36">
                        <h2 class="text-start text-2xl text-white">Age 16</h2>
                        <h1 class="text-start text-md text-neutral-200">Joined a Programming-Focused High School Course
                            in Portugal
                        </h1>
                    </div>
                </div>

                <div class="h-full border border-neutral-300 rounded-full"></div>

                <div class="h-full w-full flex flex-col items-center justify-start gap-10">
                    <div
                        class="w-full flex flex-col items-start justify-center gap-5 sm:gap-3 bg-neutral-800 p-3 sm:p-5 rounded-lg h-60 sm:h-40 mt-40">
                        <h2 class="text-start text-2xl text-white">Age 10</h2>
                        <h1 class="text-start text-md text-neutral-200">Started a Bracelet Business at School (Ended by
                            Principal)</h1>
                        <a href="/works/bracelet.jpg" target="_blank"
                            class="flex items-center gap-2 px-3 py-1 border border-neutral-500 text-neutral-200 hover:bg-neutral-700 text-sm">Learn
                            More</a>
                    </div>

                    <div
                        class="w-full flex flex-col items-start justify-center gap-3 sm:gap-5 bg-neutral-800 p-3 sm:p-5 rounded-lg h-60 sm:h-52 mt-32">
                        <h2 class="text-start text-2xl text-white">Age 15</h2>
                        <p class="text-start text-md text-neutral-200">Team project: Built, programmed, and launched a
                            mini satellite (CanSat Junior).</p>
                        <a href="https://www.esero.pt/592/Reveja-a-Final-da-1---edi--o-do-CanSat-Jr" target="_blank"
                            class="flex items-center gap-2 px-3 py-1 border border-neutral-500 text-neutral-200 hover:bg-neutral-700 text-sm"
                            aria-label="Learn more about the CanSat Junior project">Learn More</a>
                    </div>

                    <div
                        class="w-full flex flex-col items-start justify-center gap-5 sm:gap-3 bg-neutral-800 p-3 sm:p-5 rounded-lg h-60 sm:h-40 mt-36">
                        <h2 class="text-start text-2xl text-white">📍 Age 18</h2>
                        <h1 class="text-start text-md text-neutral-200">Graduated High School with Highest
                            Distinction (20/20)
                            (PAT)</h1>
                    </div>
                </div>
            </div>
        </x-container>

        <x-container class="flex flex-col items-center mt-52">
            <x-title>my <span class="text-white">secret formula </span>for <span class="text-white">web and
                    mobile</span> development</x-title>

            <div class="flex flex-col justify-between items-start gap-10 mt-10">
                <div class="w-full">
                    <img src="others/formula2.png" alt="My Development Formula" class="tel:hidden sm:block w-full rounded-lg">
                    <img src="others/formulaVertical2.png" alt="My Development Formula" class="block sm:hidden w-full rounded-lg">
                </div>
                
                <div class="w-full flex flex-col sm:flex-row gap-8 text-white">
                    <div class="bg-neutral-800 w-full flex flex-col gap-4 p-4 rounded-xl">
                        <h1 class="text-xl font-semibold text-center">Why Laravel and TailwindCSS?</h1>
                        <p class="text-neutral-400 text-center">
                            Laravel allows me to mix the back and front-end in a simple way, plus the TailwindCSS makes
                            everything super intuitive and practic to style!
                        </p>
                    </div>

                    <div class="bg-neutral-800 w-full flex flex-col gap-4 p-4 rounded-xl">
                        <h1 class="text-xl font-semibold text-center">Why MariaDB for the Database?</h1>
                        <p class="text-neutral-400 text-center">
                            I choose MariaDB for its scalability, security features and simplicity. Sometimes the
                            simplest is the best!
                        </p>
                    </div>

                    <div class="bg-neutral-800 w-full flex flex-col gap-4 p-4 rounded-xl">
                        <h1 class="text-xl font-semibold text-center">Why React Native and Laravel RestAPI?</h1>
                        <p class="text-neutral-400 text-center">
                            Whenever needed I can setup my Laravel Restfull API and use React Native to extend my web to
                            mobile development, works great for me!
                        </p>
                    </div>
                </div>
            </div>
        </x-container>

        <x-container class="flex flex-col items-center mt-52 mb-10 sm:mb-20">
            <x-title>Explore <span class="text-white">my projects</span> and the <span class="text-white">technologies</span> I’m mastering</x-title>
        
            <div class="flex flex-col justify-between items-start gap-10 mt-20">
                <div class="w-full flex flex-col sm:flex-row gap-8 text-white">
                    <div class="bg-neutral-800 w-full flex flex-col items-center justify-center gap-4 p-4 rounded-xl">
                        <img src="techs/raspberry.png" alt="Raspberry PI" class="w-1/2">
        
                        <h1 class="text-xl font-semibold text-center">Raspberry Pi 5: A Multi-Functional Setup</h1>
                        <p class="text-neutral-400 text-center">
                            Configured as a game server and for website hosting, including this portfolio site.
                        </p>
                    </div>
        
                    <div class="bg-neutral-800 w-full flex flex-col items-center justify-center gap-4 p-4 rounded-xl">
                        <img src="techs/fivem.png" alt="FiveM" class="w-1/2">
        
                        <h1 class="text-xl font-semibold text-center">FiveM Server: Customized Gaming Experience</h1>
                        <p class="text-neutral-400 text-center">
                            Developed and hosted a personalized game server with integrated web hosting.
                        </p>
                    </div>
        
                    <div class="bg-neutral-800 w-full flex flex-col items-center justify-center gap-4 p-4 rounded-xl">
                        <img src="techs/monero.png" alt="Monero" class="w-1/2">
        
                        <h1 class="text-xl font-semibold text-center">Monero Shop: Secure E-Commerce Platform</h1>
                        <p class="text-neutral-400 text-center">
                            Building an open-source Monero-based online store, emphasizing privacy and security.
                        </p>
                    </div>
                </div>
            </div>
        </x-container>        
    </x-full-container>
</x-app-layout>
