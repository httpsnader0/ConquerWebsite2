<template>

	<div>

		<Badge
			:value="$t(status == 'active' || status ? 'Active' : 'Not Active')"
			:severity="status == 'active' || status ? 'success' : 'danger'"
		/>

	</div>

</template>

<script setup>

	import Badge from 'primevue/badge';

	const props = defineProps({
		status: [String, Boolean],
	});

</script>
