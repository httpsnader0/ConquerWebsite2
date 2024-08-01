<template>

	<div class="hidden lg:flex">

		<Button
			@click="toggleSidebar"
			class="w-11 h-11 p-0 flex justify-center items-center"
		>

			<Icon :icon="['fas', hideSidebar ? ($page.props.locale == 'ar' ? 'arrow-left' : 'arrow-right') : ($page.props.locale == 'ar' ? 'arrow-right' : 'arrow-left')]" />

		</Button>

	</div>

</template>

<script setup>

	import { useStorage } from '@vueuse/core';

	const hideSidebar = useStorage('toggleSidebar', false), toggleSidebar = () => {
		hideSidebar.value = !hideSidebar.value;
		localStorage.setItem('toggleSidebar', !hideSidebar.value);
		document.querySelector('main').classList.toggle('hide-sidebar');
	};

</script>