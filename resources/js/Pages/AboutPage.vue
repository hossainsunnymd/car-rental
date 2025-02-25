<script setup>
import HeaderSection from '../Components/FrontEnd/HeaderSection.vue';
import FooterSection from '../Components/FrontEnd/FooterSection.vue';
</script>

<template>
<HeaderSection />
    <div class="w-full px-4 py-10 bg-gray-100">
        <div class="w-full bg-white p-10 rounded-lg shadow-lg">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-6 text-center">About Us</h1>
            <p class="text-gray-700 text-lg leading-relaxed text-center">Welcome to <span class="font-semibold">[Your Company Name]</span>, your trusted car rental solution! We provide seamless and hassle-free car rentals for all occasions.</p>

            <div class="mt-8 space-y-6">
                <div class="p-6 bg-blue-50 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-gray-800">Who We Are</h2>
                    <p class="text-gray-600 mt-2">We specialize in offering a wide range of well-maintained vehicles, ensuring a smooth and enjoyable rental experience for our customers.</p>
                </div>

                <div class="p-6 bg-blue-50 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-gray-800">Our Mission</h2>
                    <p class="text-gray-600 mt-2">Our goal is to provide convenient, affordable, and accessible car rentals with a strong focus on customer satisfaction.</p>
                </div>

                <div class="p-6 bg-blue-50 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-gray-800">What We Offer</h2>
                    <ul class="list-disc pl-6 text-gray-600 mt-2">
                        <li>A diverse fleet of economy, luxury, and family cars</li>
                        <li>Easy online booking with instant confirmation</li>
                        <li>Flexible rental options - daily, weekly, and long-term</li>
                        <li>Reliable customer support available 24/7</li>
                    </ul>
                </div>
            </div>

            <h2 class="text-2xl font-semibold text-gray-800 mt-10 text-center">Why Choose Us?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col items-center">
                    <h3 class="text-lg font-semibold text-gray-700">🚗 Affordable Rates</h3>
                    <p class="text-gray-600 text-center mt-2">We offer competitive pricing with no hidden fees.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col items-center">
                    <h3 class="text-lg font-semibold text-gray-700">🚗 Well-Maintained Cars</h3>
                    <p class="text-gray-600 text-center mt-2">Our vehicles are regularly serviced and insured.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col items-center">
                    <h3 class="text-lg font-semibold text-gray-700">🚗 Easy Booking</h3>
                    <p class="text-gray-600 text-center mt-2">Book your car in just a few clicks through our website.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col items-center">
                    <h3 class="text-lg font-semibold text-gray-700">🚗 24/7 Support</h3>
                    <p class="text-gray-600 text-center mt-2">We are here to assist you anytime, anywhere.</p>
                </div>
            </div>

            <div class="mt-10 text-center">
                <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg hover:bg-blue-700 text-lg font-semibold">Contact Us</a>
            </div>
        </div>
    </div>
    <FooterSection />
</template>

<style scoped>

</style>
