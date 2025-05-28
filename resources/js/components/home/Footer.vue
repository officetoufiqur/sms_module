<script setup lang="ts">

</script>

<template>
    <section class="mt-24">
        <footer class="bg-[#0f79bc] text-white w-full">
            <div class="mx-auto w-full max-w-7xl p-4 py-6 lg:py-8">
                <div class="lg:grid grid-cols-5 px-5 lg:px-16 xl:px-0 gap-5 pt-10">
                    <div class="lg:col-span-2 mr-[3rem]">
                        <a href="#" class="flex items-center">
                            <img src="/assets/img/400_143.png" class="h-20 me-3" alt="Logo" />
                        </a>
                        <p class="text-justify mt-5">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Asperiores est distinctio labore laudantium unde corporis deleniti
                            quaerat a sapiente minima?
                        </p>
                    </div>
                    <div class="lg:col-span-3 mt-10 lg:mt-0">
                        <div class="grid lg:grid-cols-3 md:grid-cols-3 footer_item">
                            <div class="w-full">
                                <h1 class="mb-6 hr_border font-semibold uppercase">
                                    Quick Section
                                </h1>
                                <ul class="font-medium">
                                    <li class="mb-1 text-white">
                                        <a href="#" class="hover:underline">Home</a>
                                    </li>
                                    <li class="mb-1 text-white">
                                        <a href="#" class="hover:underline">About</a>
                                    </li>
                                    <li class="mb-1 text-white">
                                        <a href="#" class="hover:underline">FAQs</a>
                                    </li>
                                    <li class="mb-1 text-white">
                                        <a href="#" class="hover:underline">Guide</a>
                                    </li>
                                    <li class="mb-1 text-white">
                                        <a href="#" class="hover:underline">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="...">
                                <h1 class="mb-6 hr_border font-semibold text-white uppercase">
                                    Policy
                                </h1>
                                <ul class="text-white font-medium">
                                    <li class="mb-1">
                                        <a href="#" class="hover:underline">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="#" class="hover:underline">Terms & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#" class="hover:underline">Refund Policy</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-8 md:mt-0 lg:mt-0">
                                <h1 class="mb-6 hr_border font-semibold text-white uppercase">
                                    Contact
                                </h1>
                                <ul class="text-white font-medium cursor-pointer md:w-[100%] w-[120%] ">
                                    <li class="mb-1">
                                        <i class="fa-solid fa-envelope pr-2"></i> info@message.go.com
                                    </li>
                                    <li class="mb-1">
                                        <i class="fa-solid fa-phone-volume pr-2"></i> +88 0123456789
                                    </li>
                                    <li class="mb-1">
                                        <i class="fa-solid fa-location-dot pr-2"></i> your location here
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between md:mx-10 lg:mx-16">
                    <span class="text-sm text-white sm:text-center flex justify-center lg:block">&copy; 2025
                        message.go.com , All rights reserved.
                    </span>
                    <div class="flex mt-4 justify-center lg:justify-between space-x-4 cursor-pointer text-2xl">
                        <a class="hover:text-[#4a4745] duration-300" href=""><i class="fa-brands fa-facebook"></i></a>
                        <a class="hover:text-[#4a4745] duration-300" href=""><i class="fa-brands fa-linkedin"></i></a>
                        <a class="hover:text-[#4a4745] duration-300" href=""><i
                                class="fa-brands fa-square-twitter"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</template>

<style scoped>
@media only screen and (max-width: 426px) {
    .footer_item {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>