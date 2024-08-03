<template>

	<AppHead title="Blogs" />

	<DataView
		:data="blogs"
		:queryParams="queryParams"
	/>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import DataView from '@/Components/Table/DataView.vue';
	import QueryParameters from '@/Classes/QueryParameters';
	import { ref } from 'vue';

	const props = defineProps({
		blogs: Object,
	});

	const params = new QueryParameters(), queryParams = ref({});

</script>