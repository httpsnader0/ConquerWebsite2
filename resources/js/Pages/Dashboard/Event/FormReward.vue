<template>

	<FormTranslatable
		:label="$t('Reward Name')"
		:form="form"
		name="rewardName"
		:hasRepeated="true"
		field="rewards"
		:index="index"
		required
	/>

</template>

<script setup>

	import FormTranslatable from "@/Components/Form/FormTranslatable.vue";

	const props = defineProps({
		index: Number,
		form: Object,
	});

</script>