<template>

	<main class="auth-bg w-full min-h-screen p-3 xl:p-10 flex justify-center items-center bg-gray-100 dark:bg-darkbg-primary">

		<section class="w-full lg:w-3/4 min-h-[600px] relative rounded-3xl shadow-lg flex flex-col lg:flex-row justify-between items-stretch border border-border-light dark:border-border-dark bg-white dark:bg-darkbg-secondary overflow-hidden">

			<div class="auth-bg1 w-full lg:w-2/5 h-52 lg:h-auto flex before:content-[''] before:absolute before:-top-[50%] before:lg:-top-[30%] before:ltr:-left-[30%] before:rtl:-right-[30%] before:ltr:bg-gradient-to-tr before:rtl:bg-gradient-to-tl before:from-webSecondary before:to-webPrimary before:ltr:rounded-r-[300px] after:ltr:rounded-r-[300px] before:rtl:rounded-l-[300px] after:rtl:rounded-l-[300px] before:w-[140%] before:h-[150%] before:shadow-2xl before:ltr:rotate-12 after:ltr:rotate-12 before:rtl:-rotate-12 after:rtl:-rotate-12 after:content-[''] after:absolute after:-top-[50%] after:lg:-top-[30%] after:ltr:-left-[30%] after:rtl:-right-[30%] after:w-[140%] after:h-[150%]  justify-center items-center relative">

				<img
					:src="asset($page.props.settings.logo)"
					class="relative z-10"
				/>

			</div>

			<div class="mt-8 lg:mt-0 w-full lg:w-3/5 dark:text-white flex flex-col justify-center items-center gap-5 px-5 ltr:lg:pr-8 rtl:lg:pl-8 ltr:lg:pl-32 rtl:lg:pr-32 py-5 lg:py-16">

				<slot />

			</div>

		</section>

	</main>

	<SpeedDial
		:model="items"
		:radius="100"
		:transitionDelay="80"
		showIcon="pi pi-cog"
		type="quarter-circle"
		class="!fixed"
		:direction="page.props.locale === 'ar' ? 'up-right' : 'up-left'"
		:style="page.props.locale === 'ar' ? { left: '20px', bottom: '20px' } : { right: '20px', bottom: '20px' }"
	/>

	<NotificationAlert />

</template>

<script setup>

	import SpeedDial from 'primevue/speeddial';
	import NotificationAlert from '@/Components/Shared/NotificationAlert.vue';
	import { ref, onMounted } from 'vue';
	import { router, usePage } from '@inertiajs/vue3';
	import { useStorage } from '@vueuse/core';

	const page = usePage(), theme = useStorage('theme', 'light');
	const items = ref([
		{
			icon: 'pi pi-language',
			command: () => {
				router.get(route('website.locale-update'), {}, {
					onSuccess: () => {
						location.reload();
					},
				});
			}
		},
		{
			icon: 'pi pi-sun',
			command: () => {
				if (theme.value == 'light') {
					theme.value = 'dark';
					document.documentElement.classList.add('dark');
				} else {
					theme.value = 'light';
					document.documentElement.classList.remove('dark');
				}
				localStorage.setItem('theme', theme.value);
			},
		},
	]);

	onMounted(() => {

		if (theme.value == 'dark') {
			document.documentElement.classList.add('dark');
		}

	});

</script>