<template>

	<InlineMessage
		:severity="severity"
		:pt="{
			root: { class: 'w-full justify-start' },
		}"
	>

		<slot />

	</InlineMessage>

</template>

<script setup>

	import InlineMessage from 'primevue/inlinemessage';

	const props = defineProps({
		severity: {
			type: String,
			default: 'error',
		},
	});

</script>
