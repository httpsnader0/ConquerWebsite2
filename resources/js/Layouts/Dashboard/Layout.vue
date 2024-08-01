<template>

	<main
		class="w-full h-screen bg-gray-100 dark:bg-darkbg-secondary"
		:class="hideSidebar == 'true' ? 'hide-sidebar' : ''"
	>

		<Sidebar />

		<section class="page-container fixed lg:ltr:left-64 lg:rtl:right-64 top-0 w-full lg:w-[calc(100%-16rem)] h-full transition-all duration-300 ease-in-out">

			<Header />

			<ScrollPanel
				id="pageContent"
				class="w-full h-[calc(100%-4rem)]"
			>

				<div class="p-5 rtl:pb-10 rtl:pl-10">

					<slot />

				</div>

			</ScrollPanel>

		</section>

	</main>

	<NotificationAlert />

</template>

<script setup>

	import Sidebar from './Sidebar.vue';
	import Header from './Header.vue';
	import NotificationAlert from '@/Components/Shared/NotificationAlert.vue';
	import { useStorage } from '@vueuse/core';
	import { onMounted } from 'vue';

	const hideSidebar = useStorage('toggleSidebar'), theme = useStorage('theme', 'light');
	onMounted(() => {

		if (theme.value == 'dark') {
			document.documentElement.classList.add('dark');
		}

	});

</script>
