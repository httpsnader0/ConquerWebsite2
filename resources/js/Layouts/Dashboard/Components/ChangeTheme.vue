<template>

	<Button
		@click="changeTheme"
		class="w-11 h-11 p-0 flex justify-center items-center"
	>

		<Icon :icon="['fas', theme == 'light' ? 'moon' : 'sun']" />

	</Button>

</template>

<script setup>

	import { useStorage } from '@vueuse/core';

	const theme = useStorage('theme', 'light'), changeTheme = () => {
		if (theme.value === 'light') {
			theme.value = 'dark';
			document.documentElement.classList.add('dark');
		} else {
			theme.value = 'light';
			document.documentElement.classList.remove('dark');
		}
		localStorage.setItem('theme', theme.value);
	};

</script>