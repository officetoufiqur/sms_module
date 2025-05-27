<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import NavBar from '@/components/home/NavBar.vue';
import Pricing from '@/components/home/Pricing.vue';
import Accordion from '@/components/home/Accordion.vue';
import Footer from '@/components/home/Footer.vue';

</script>

<template>

    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <NavBar />

    <main>
        <section>
            <div class="mx-auto px-4 py-8 w-full h-[80vh] bg-[#0f79bc] flex flex-col justify-center items-center">
                <div class="mt-[-13rem]">
                    <h1 class="text-6xl text-white font-bold text-center mb-4 leading-18">Best Bulk SMS <br> Service for
                        Your Business</h1>
                    <p class="text-center text-white mt-3 leading-6">Reliable, fast, and affordable bulk SMS solutions
                        for
                        businesses, organizations, and individuals.<br> Reach your audience instantly with our masking
                        and
                        non-masking SMS services.</p>
                </div>
            </div>
            <div class="flex justify-center items-center mt-[-20rem]">
                <img src="/assets/img/bashboard.jpg" alt="Logo" class="w-[45rem] mr-2 shadow-xl rounded-3xl">
            </div>
        </section>

        <section class="mt-20 max-w-7xl mx-auto">
            <div class="text-center">
                <h1 class="text-4xl leading-12 font-semibold text-[#0f79bc]">Send SMS Campaigns to 1,000+ <br> Mobile
                    Network
                    Operators
                    in More then 200 Countries</h1>
                <p class="mt-3 text-xl">You can reach your customer from anywherein the world with an SMS service
                </p>
            </div>
            <div class="mt-20 flex justify-between gap-20">
                <div class="w-1/2">
                    <img src="/assets/img/Screenshot_1.png" alt="">
                </div>
                <div class="w-1/2 space-y-5">
                    <div class="flex justify-center items-center gap-5">
                        <div class="bg-white py-5 px-10 rounded-lg border border-gray-200 space-y-2">
                            <h2 class="text-[#0f79bc] text-xl font-semibold">Complete Language Support</h2>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur, odit quae
                                officiis
                                veritatis aliquid maiores voluptates?</p>
                        </div>
                    </div>
                    <div class="flex justify-center items-center gap-5">
                        <div class="bg-white py-5 px-10 rounded-lg border border-gray-200 space-y-2">
                            <h2 class="text-[#0f79bc] text-xl font-semibold">Complete Language Support</h2>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur, odit quae
                                officiis
                                veritatis aliquid maiores voluptates?</p>
                        </div>
                    </div>
                    <div class="flex justify-center items-center gap-5">
                        <div class="bg-white py-5 px-10 rounded-lg border border-gray-200 space-y-2">
                            <h2 class="text-[#0f79bc] text-xl font-semibold">Complete Language Support</h2>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur, odit quae
                                officiis
                                veritatis aliquid maiores voluptates?</p>
                        </div>
                    </div>
                    <div class="flex justify-center items-center gap-5">
                        <div class="bg-white py-5 px-10 rounded-lg border border-gray-200 space-y-2">
                            <h2 class="text-[#0f79bc] text-xl font-semibold">Complete Language Support</h2>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur, odit quae
                                officiis
                                veritatis aliquid maiores voluptates?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto mt-24">
            <!-- about us -->
            <div class="text-center">
                <h1 class="text-4xl leading-12 font-semibold text-[#0f79bc]">About Us</h1>
                <p class="mt-3 text-xl">We are a leading provider of bulk SMS services, offering reliable and
                    <br> cost-effective solutions for businesses and individuals.
                </p>
            </div>
            <div class="mt-12 flex justify-between gap-20">
                <div class="w-1/2 flex justify-center items-center">
                    <img src="/assets/img/about_us.jpg" class="bg-white rounded-lg border border-gray-200" alt="">
                </div>
                <div class="w-1/2 text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab inventore ut dignissimos quidem nemo
                        earum eos expedita fuga. Et nisi distinctio, similique recusandae aspernatur, ea saepe,
                        inventore velit quidem ipsam nobis exercitationem corrupti id debitis autem delectus fugiat.
                        Asperiores et fugiat a quisquam repellendus? Veniam, possimus, omnis distinctio corporis nisi
                        corrupti impedit magni consectetur, consequatur odio quo eos ratione odit totam quasi repellat
                        quas eveniet? Ea earum deserunt corrupti. Excepturi corrupti unde consequatur vitae rem
                        temporibus culpa soluta aut. Id saepe nihil, reprehenderit veniam inventore rerum deleniti neque
                        reiciendis dolores recusandae assumenda odio modi et nostrum, quas officiis accusamus possimus?
                        Magnam soluta officia a consectetur veritatis earum ut illo sed neque dolorum eaque repellat,
                        reiciendis sint quas voluptate iste impedit laboriosam debitis cumque. Laborum nemo quas animi
                        exercitationem voluptates error, nesciunt fugiat ducimus perferendis in cum eum quae, velit
                        voluptas repellendus blanditiis saepe quos at illo hic aspernatur autem. Recusandae, quas nemo
                        pariatur, totam mollitia odit esse aspernatur porro molestiae delectus, laborum debitis? Ad
                        illo, reprehenderit praesentium exercitationem voluptatibus recusandae atque. Necessitatibus,
                        ullam, voluptatibus aspernatur sint enim reiciendis possimus ipsa quae consequuntur sapiente
                        quo, quam obcaecati cum? Itaque recusandae reiciendis, repellendus saepe iusto dicta suscipit
                        molestiae, qui et blanditiis quaerat.</p>
                </div>
            </div>

        </section>



        <Pricing />
        <Accordion />

        

        <Footer />
    </main>


</template>

<style scoped></style>
