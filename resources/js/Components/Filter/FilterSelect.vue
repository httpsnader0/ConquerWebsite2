<template>

	<Dropdown
		v-model="queryParams[name]"
		:options="options"
		:option-label="optionLabel"
		:option-value="optionValue"
		:showClear="true"
		:filter="true"
		:placeholder="placeholder"
		v-bind="$attrs"
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
		queryParams: Object,
		name: String,
		placeholder: String,
		options: Array,
		optionLabel: {
			type: String,
			default: 'name',
		},
		optionValue: {
			type: String,
			default: 'value',
		},
	});

</script>