<template>

	<a
		:href="filePreview"
		target="_blank"
		class="w-32 h-32 flex justify-center items-center border border-border-light dark:border-border-dark rounded-[8px] shadow overflow-hidden"
	>

		<Icon
			:icon="['fas', 'file-pdf']"
			class="!text-7xl !text-red-500"
		/>

	</a>

</template>

<script setup>

	const props = defineProps({
		filePreview: String,
		disableMargin: Boolean,
	});

</script>
