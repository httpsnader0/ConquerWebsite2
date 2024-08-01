<template>

	<div>

		<Label
			:label="label"
			:form="form"
			:name="name"
			:required="required"
			:hideLabel="hideLabel"
		/>

		<div class="grid grid-cols-1 md:grid-cols-3 gap-3">
			<div class="md:col-span-2 order-2 md:order-1">

				<InputText
					:id="name"
					v-model="form[name]"
					type="number"
					class="w-full no-spinner"
					:min="0"
					v-bind="$attrs"
					autocomplete="off"
					placeholder="5xxxxxxxx"
					dir="ltr"
				/>

				<Error
					:form="form"
					:name="name"
				/>

			</div>
			<div class="order-1 md:order-2">

				<Dropdown
					v-model="form[name + '_code']"
					:options="countryOptions?.map(country => ({
						id: country.data.id,
						name: country.data.name,
						value: '+' + country.data.callingcode,
					}))"
					optionLabel="value"
					optionValue="value"
					:filterFields="['name', 'value']"
					filter
					class="w-full"
					dir="ltr"
				>
					<template #option="slotProps">
						<div class="flex items-center gap-2">
							{{ slotProps.option.name }}
							<span
								class="text-sm text-gray-400"
								dir="ltr"
							>( {{ slotProps.option.value }} )</span>
						</div>
					</template>

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
					:name="name + '_code'"
				/>

			</div>
		</div>

	</div>

</template>

<script setup>

	import Dropdown from "primevue/dropdown";
	import InputText from "primevue/inputtext";
	import Label from "./Label.vue";
	import Error from "./Error.vue";
	import { useI18n } from "vue-i18n";

	const i18n = useI18n();
	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		required: Boolean,
		hideLabel: Boolean,
		countryOptions: Object,
	});

</script>
