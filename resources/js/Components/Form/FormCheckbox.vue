<template>

	<div class="flex items-center gap-3">

		<Checkbox
			v-if="forAbility"
			v-model="form[name]"
			:name="name"
			:value="value"
			:inputId="id"
		/>

		<Checkbox
			v-else
			v-model="form[name]"
			:name="name"
			:binary="true"
			:inputId="id"
		/>

		<label
			:for="id"
			class="checkbox-label text-sm cursor-pointer"
		>
			{{ label }}
		</label>

	</div>

</template>

<script setup>

	import Checkbox from "primevue/checkbox";
	import { computed } from "vue";

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		value: String,
		id: String,
		form: Object,
		forAbility: {
			type: Boolean,
			default: false,
		}
	});

	const id = computed(() => props.id ?? props.name);

</script>
