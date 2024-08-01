<template>

	<Button
		@click="notificationVisible = true"
		:class="buttonClass"
	>

		<Icon :icon="['fas', icon]" />

	</Button>

	<Sidebar
		v-model:visible="notificationVisible"
		v-bind="$attrs"
		:pt="{
			root: { class: 'border-r border-solid border-border-light dark:border-border-dark' },
		}"
	>

		<slot name="header" />

		<div class="w-full h-[calc(100%-8rem)] bg-white dark:bg-darkbg-primary">

			<ScrollPanel
				class="h-full"
				:pt="{
					content: { class: '!w-full !p-0' },
				}"
			>

				<slot name="content" />

			</ScrollPanel>

		</div>

		<slot name="footer" />

	</Sidebar>

</template>

<script setup>

	import { ref } from 'vue';

	const notificationVisible = ref(false);

	const props = defineProps({
		icon: String,
		buttonClass: {
			type: String,
			default: null,
		},
	});

</script>