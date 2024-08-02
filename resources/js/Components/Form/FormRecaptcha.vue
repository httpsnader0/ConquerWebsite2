<template>

	<div>

		<Label
			:label="$t('Recaptcha')"
			:form="form"
			:name="name"
			required
		/>

		<ChallengeV3
			v-model="form[name]"
			action="submit"
			v-bind="$attrs"
		>
			<ToggleButton
				v-model="checked"
				:onLabel="$t('I\'am Not a Robot')"
				:offLabel="$t('I\'am Not a Robot')"
				class="w-full"
			/>
		</ChallengeV3>

		<Error
			:form="form"
			:name="name"
		/>

	</div>

</template>

<script setup>

	import { useRecaptchaProvider, ChallengeV3 } from "vue-recaptcha";
	import ToggleButton from 'primevue/togglebutton';
	import Label from "./Label.vue";
	import Error from "./Error.vue";
	import { computed } from 'vue';

	useRecaptchaProvider();

	const props = defineProps({
		form: Object,
		name: String,
	});

	const checked = computed(() => {
		return props.form[props.name] ? true : false;
	});

</script>
