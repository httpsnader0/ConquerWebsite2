<template>

	<Button
		@click="changeLocale"
		class="w-11 h-11 p-0 flex justify-center items-center"
	>

		<Icon :icon="['fas', 'language']" />

	</Button>

</template>

<script setup>

	import { router } from '@inertiajs/vue3';

	const changeLocale = () => {
		router.get(route('website.locale-update'), {}, {
			onSuccess: () => {
				location.reload();
			},
		});
	};

</script>