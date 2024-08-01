<template>

	<div
		v-bind="$attrs"
		class="flex justify-center items-center border border-border-light dark:border-border-dark rounded-[8px] shadow overflow-hidden"
	>
		<Image
			:src="src"
			preview
			class="w-full h-full rounded-[8px] overflow-hidden flex justify-center items-center p-2"
			:class="{ 'bg-darkbg-secondary': isBlack }"
		/>
	</div>

</template>

<script setup>

	import Image from 'primevue/image';

	const props = defineProps({
		src: String,
		isBlack: Boolean,
	});

</script>
