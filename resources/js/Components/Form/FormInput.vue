<template>

	<div>

		<Label
			:label="label"
			:form="form"
			:name="name"
			:required="required"
			:hideLabel="hideLabel"
		/>

		<div class="p-inputgroup">

			<span
				v-if="hasGroupBefore"
				class="p-inputgroup-addon"
				v-text="groupBeforeLabel"
			/>

			<template v-if="hasRepeated">

				<Textarea
					v-if="textarea"
					:id="name"
					v-model="form[field][index][name]"
					rows="5"
					cols="30"
					class="w-full !rounded-[8px]"
					:class="{'input-group' : hasGroupBefore || hasGroupAfter}"
					v-bind="$attrs"
					autoResize
				/>

				<InputText
					v-else
					:id="name"
					v-model="form[field][index][name]"
					:type="type ?? 'text'"
					class="w-full"
					:class="{'input-group' : hasGroupBefore || hasGroupAfter}"
					v-bind="$attrs"
					autocomplete="off"
				/>

			</template>
			<template v-else>

				<Textarea
					v-if="textarea"
					:id="name"
					v-model="form[name]"
					rows="5"
					cols="30"
					class="w-full !rounded-[8px]"
					:class="{'input-group' : hasGroupBefore || hasGroupAfter}"
					v-bind="$attrs"
					autoResize
				/>

				<InputText
					v-else
					:id="name"
					v-model="form[name]"
					:type="type ?? 'text'"
					class="w-full"
					:class="{'input-group' : hasGroupBefore || hasGroupAfter}"
					v-bind="$attrs"
					autocomplete="off"
				/>

			</template>

			<span
				v-if="hasGroupAfter"
				class="p-inputgroup-addon"
				v-text="groupAfterLabel"
			/>

		</div>

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

	import Label from "./Label.vue";
	import Error from "./Error.vue";

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		required: Boolean,
		hideLabel: Boolean,
		hasGroupBefore: Boolean,
		groupBeforeLabel: String,
		hasGroupAfter: Boolean,
		groupAfterLabel: String,
		textarea: Boolean,
		type: String,
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
