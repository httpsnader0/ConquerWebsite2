<template>

	<div>

		<Label
			:label="label"
			:form="form"
			:name="name"
			:required="required"
			:hideLabel="hideLabel"
		/>

		<Password
			v-model="form[name]"
			class="w-full"
			toggleMask
			:feedback="feedback"
			:promptLabel="$t('Choose a Password')"
			:weakLabel="$t('Too Simple')"
			:mediumLabel="$t('Average Complexity')"
			:strongLabel="$t('Complex Password')"
			v-bind="$attrs"
			:pt="{
				input: { id: name, autocomplete: 'off' },
				showIcon: { class: 'ltr:right-[0.75rem] rtl:right-[unset] rtl:left-[0.75rem]' },
				hideIcon: { class: 'ltr:right-[0.75rem] rtl:right-[unset] rtl:left-[0.75rem]' },
			}"
		/>

		<Error
			:form="form"
			:name="name"
		/>

	</div>

</template>

<script setup>

	import Password from "primevue/password";
	import Label from "./Label.vue";
	import Error from "./Error.vue";

	const props = defineProps({
		label: String,
		form: Object,
		name: String,
		required: Boolean,
		hideLabel: Boolean,
		feedback: Boolean,
	});

</script>
