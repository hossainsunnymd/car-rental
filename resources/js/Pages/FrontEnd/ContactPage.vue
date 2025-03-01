<script setup>
import FooterSection from '../../Components/FrontEnd/FooterSection.vue';
import HeaderSection from '../../Components/FrontEnd/HeaderSection.vue';
</script>

<template>
<HeaderSection />
    <div class="w-full px-4 py-10">
        <div class="w-full bg-white p-10 rounded-lg shadow-lg">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-6 text-center">Contact Us</h1>
            <p class="text-gray-700 text-lg leading-relaxed text-center">Have questions or need assistance? Reach out to us, and we'll be happy to help!</p>

            <div class="mt-8">
                <form class="space-y-6 max-w-2xl mx-auto">
                    <div>
                        <label class="block text-gray-700 font-semibold" for="name">Full Name</label>
                        <input type="text" id="name" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your name">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold" for="email">Email Address</label>
                        <input type="email" id="email" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold" for="message">Message</label>
                        <textarea id="message" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="5" placeholder="Type your message here"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg hover:bg-blue-700 text-lg font-semibold">Send Message</button>
                    </div>
                </form>
            </div>

            <div class="mt-10 text-center">
                <h2 class="text-2xl font-semibold text-gray-800">Our Contact Information</h2>
                <p class="text-gray-600 mt-2">📍 123 Main Street, Your City, Country</p>
                <p class="text-gray-600">📞 +123 456 7890</p>
                <p class="text-gray-600">✉ support@carrental.com</p>
            </div>
        </div>
    </div>

    <FooterSection />
</template>

<style scoped>

</style>
