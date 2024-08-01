<template>

	<div
		class="w-full flex justify-center items-center gap-5"
		:class="{ 'mb-5': index == 19 }"
	>

		<div class="w-12 h-12 rounded-xl flex justify-center items-center bg-primary text-white">
			<Icon :icon="['fas', `${notification.type}`]" />
		</div>

		<div class="w-[calc(100%-48px)]">
			<div class="max-h-12 text-gray-500 dark:text-white overflow-hidden mb-1">{{ $t(notification?.data?.body?.translationKey) }}</div>
			<div class="capitalize text-xs text-primary">{{ notification?.createdAt }}</div>
		</div>

	</div>

</template>

<script setup>

	const props = defineProps({
		index: Number,
		notification: Object,
	});

</script>