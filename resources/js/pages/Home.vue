<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import NavBar from '@/components/home/NavBar.vue';
import Pricing from '@/components/home/HomePricing.vue';
import Accordion from '@/components/home/Accordion.vue';
import Slider from '@/components/home/Slider.vue';
import Blog from '@/components/home/Blog.vue';
import About from '@/components/home/About.vue';
import Contact from '@/components/home/Contact.vue';
import Footer from '@/components/home/Footer.vue';


const testimonials = [
    {
        text: "Acnoo gives a great support. I am a newbie on Flutter and Firebase...",
        name: "Bestomall",
        date: "25 Jan, 2024",
        bg: "bg-blue-100"
    },
    {
        text: "Acnoo gives a great support. I am a newbie on Flutter and Firebase...",
        name: "Bestomall",
        date: "25 Jan, 2024",
        bg: "bg-orange-100"
    },
    {
        text: "Acnoo gives a great support. I am a newbie on Flutter and Firebase...",
        name: "Bestomall",
        date: "25 Jan, 2024",
        bg: "bg-purple-200"
    },
    {
        text: "Acnoo gives a great support. I am a newbie on Flutter and Firebase...",
        name: "Bestomall",
        date: "25 Jan, 2024",
        bg: "bg-pink-100"
    }, {
        text: "Acnoo gives a great support. I am a newbie on Flutter and Firebase...",
        name: "Bestomall",
        date: "25 Jan, 2024",
        bg: "bg-blue-100"
    },
    {
        text: "Acnoo gives a great support. I am a newbie on Flutter and Firebase...",
        name: "Bestomall",
        date: "25 Jan, 2024",
        bg: "bg-orange-100"
    },
    {
        text: "Acnoo gives a great support. I am a newbie on Flutter and Firebase...",
        name: "Bestomall",
        date: "25 Jan, 2024",
        bg: "bg-purple-200"
    },
    {
        text: "Acnoo gives a great support. I am a newbie on Flutter and Firebase...",
        name: "Bestomall",
        date: "25 Jan, 2024",
        bg: "bg-pink-100"
    }
]

defineProps<{
    banner: {
        id: number;
        title: string;
        sub_title: string;
        image: string;
    };
}>();
</script>

<template>

    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <NavBar />

    <main>
        <section id="home">
            <div class="home lg:mx-auto px-4 py-8 xl:h-[85vh] lg:h-[100vh] h-[50vh] bg-[#0f79bc] flex flex-col justify-center items-center">
                <div class="lg:mt-[-13rem]">
                    <h1 class="lg:text-6xl max-w-2xl mx-auto text-5xl text-white font-bold text-center mb-4 lg:leading-18 leading-12">{{ banner.title }}</h1>
                    <p class="text-center max-w-2xl mx-auto text-white mt-3 leading-6 px-5 lg:px-0">{{ banner.sub_title }}.</p>
                </div>
            </div>
            <div class="flex justify-center items-center lg:mt-[-20rem] mt-[-10rem]">
                <img :src="banner.image" alt="banner image" class="lg:w-[45rem] w-[25rem] mr-2 shadow-xl rounded-3xl">
            </div>
        </section>

        <section id="" class="mt-20 max-w-7xl mx-auto">
            <div class="text-center sms">
                <h1 class="text-4xl leading-12 font-semibold text-[#0f79bc]">Send SMS Campaigns to 1,000+ <br> Mobile
                    Network
                    Operators
                    in More then 200 Countries</h1>
                <p class="mt-3 text-xl">You can reach your customer from anywherein the world with an SMS service
                </p>
            </div>
            <div class="mt-20 lg:flex justify-between gap-20 mx-10 lg:mx-16 xl:mx-0 space-y-12 lg:space-y-0">
                <div class="lg:w-1/2 flex justify-center items-center">
                    <img  src="/assets/img/Screenshot_1.png" alt="">
                </div>
                <div class="lg:w-1/2 space-y-5">
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

        <About />
        <Pricing />
        <Accordion />
        
        <div class="max-w-7xl mx-auto mt-14">
            <h1 class="text-4xl font-bold mb-4 text-center text-[#0f79bc]">What Our Client Say</h1>
            <Slider :testimonials="testimonials" />
        </div>

        

        <Blog />
        <Contact />

        
        <Footer />
    </main>



</template>

<style scoped></style>
