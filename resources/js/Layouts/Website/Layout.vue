<template>

	<main class="website">

		<Navbar />

		<Header />

		<section class="px-20">
			<slot />
		</section>

		<Footer />

	</main>

	<NotificationAlert />

</template>

<script setup>

	import Navbar from './Components/Navbar.vue';
	import Header from './Components/Header.vue';
	import Footer from './Components/Footer.vue';
	import NotificationAlert from '@/Components/Shared/NotificationAlert.vue';

</script>