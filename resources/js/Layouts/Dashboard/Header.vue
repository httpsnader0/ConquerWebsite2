<template>

	<header class="w-ful h-16 flex justify-center md:justify-between items-center gap-1 px-5 bg-white dark:bg-darkbg-primary border-b border-border-light dark:border-border-dark shadow-lg">

		<div class="flex justify-start items-center gap-1">

			<ToggleSidebar />

		</div>

		<div class="flex justify-start items-center gap-2">

			<MobileSidebar />

			<Notifications />

			<ChangeTheme />

			<ChangeLocale />

			<ProfileMenu />

		</div>

	</header>

</template>

<script setup>

	import ToggleSidebar from './Components/ToggleSidebar.vue';
	import MobileSidebar from './Components/MobileSidebar.vue';
	import Notifications from './Components/Notifications.vue';
	import ChangeTheme from './Components/ChangeTheme.vue';
	import ChangeLocale from './Components/ChangeLocale.vue';
	import ProfileMenu from './Components/ProfileMenu.vue';

</script>