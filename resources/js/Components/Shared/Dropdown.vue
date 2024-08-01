<template>

	<Dropdown
		:options="options"
		:option-label="optionLabel"
		:option-value="optionValue"
		:showClear="clearable"
		:filter="filterable"
		class="w-full"
	>

		<template #emptyfilter>
			<div class="w-full text-center">{{ $t('There Is No Results') }}</div>
		</template>

		<template #empty>
			<div class="w-full text-center">{{ $t('There Is No Option Founded') }}</div>
		</template>

		<template #filtericon>
			<Icon
				:icon="['fas', 'filter']"
				class="p-dropdown-filter-icon"
			/>
		</template>

	</Dropdown>

</template>

<script setup>

	import Dropdown from 'primevue/dropdown';

	const props = defineProps({
		clearable: Boolean,
		filterable: Boolean,
		options: Array,
		optionLabel: String,
		optionValue: String,
	});

</script>
