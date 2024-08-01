<template>

	<div>

		<Label
			:label="label"
			:form="form"
			:name="name"
			:required="required"
			:hideLabel="hideLabel"
			:asDiv="true"
		/>

		<Dropdown
			v-if="hasRepeated"
			v-model="form[field][index][name]"
			:options="options"
			:option-label="optionLabel"
			:option-value="optionValue"
			:showClear="clearable"
			:filter="filterable"
			class="w-full"
			:placeholder="placeholder ? `${$t('Select')} ${placeholder}` : ''"
			v-bind="$attrs"
			:pt="{
				filterInput: { id: name },
			}"
		>

			<template #emptyfilter>
				<div class="w-full text-center">{{ $t('There Is No Results') }}</div>
			</template>

			<template #empty>
				<div class="w-full text-center">{{ $t('There Is No Option Founded') }}</div>
			</template>

			<template #filtericon>
				<i class="pi pi-filter p-dropdown-filter-icon"></i>
			</template>

		</Dropdown>

		<Dropdown
			v-else
			v-model="form[name]"
			:options="options"
			:option-label="optionLabel"
			:option-value="optionValue"
			:showClear="clearable"
			:filter="filterable"
			class="w-full"
			:placeholder="placeholder ? `${$t('Select')} ${placeholder}` : ''"
			v-bind="$attrs"
			:pt="{
				filterInput: { id: name },
			}"
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

		<Error
			:form="form"
			:name="name"
			:hasRepeated="hasRepeated"
			:field="field"
			:index="index"
		/>

	</div>

</template>

<script setup>

	import Dropdown from "primevue/dropdown";
	import Label from './Label.vue';
	import Error from './Error.vue';

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		placeholder: String,
		required: Boolean,
		clearable: Boolean,
		filterable: Boolean,
		options: Array,
		optionLabel: {
			type: String,
			default: "name",
		},
		optionValue: {
			type: String,
			default: "value",
		},
		hideLabel: Boolean,
		hasRepeated: {
			type: Boolean,
			default: false,
		},
		field: {
			type: String,
			default: '',
		},
		index: {
			type: Number,
			default: 0,
		},
	});

</script>
