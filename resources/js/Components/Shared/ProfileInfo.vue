<template>

	<div
		v-if="image"
		class="flex flex-col gap-5 text-xl"
	>

		<span class="flex items-center gap-5 text-gray-400 whitespace-nowrap">
			<Icon :icon="['fas', icon]" /> {{ label }} :
		</span>

		<FilePreview
			v-if="!isFile"
			:src="image"
			class="w-56 h-56"
		/>

		<a
			v-else
			:href="image"
			target="_blank"
			class="w-56 h-56"
		>
			<PDFPreview class="w-full h-full" />
		</a>

	</div>

	<div
		v-else
		class="flex flex-col md:flex-row items-center justify-start gap-5 text-xl"
		v-bind="$attrs"
	>

		<span class="flex items-center gap-5 text-gray-400 whitespace-nowrap">
			<Icon :icon="['fas', icon]" /> {{ label }} :
		</span>

		{{ value }}

		<slot />

	</div>

</template>

<script setup>

	import FilePreview from '@/Components/Avatar/FilePreview.vue';
	import PDFPreview from '@/Components/Avatar/PDFPreview.vue';

	defineProps({
		image: String,
		icon: {
			type: String,
			default: 'info-circle',
		},
		label: String,
		value: [String, Number],
		isFile: {
			default: false,
			type: Boolean,
		},
	});

</script>
