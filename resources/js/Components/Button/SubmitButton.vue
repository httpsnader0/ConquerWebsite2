<template>

	<Button
		:label="type == 'icon' ? '' : (label ?? $t('Save'))"
		type="submit"
		:loading="loading"
		v-bind="$attrs"
		:pt="{
			root: { class: 'min-w-full md:min-w-[250px] flex justify-center items-center gap-3 ltr:ml-auto rtl:mr-auto' },
			label: { class: '!w-fit m-0 flex-none' },
		}"
	>

		<span v-if="type == 'icon'">

			<i :icon="icon" />

		</span>

	</Button>

</template>

<script setup>

	const props = defineProps({
		loading: Boolean,
		label: String,
		type: String,
		icon: String,
	});

</script>
