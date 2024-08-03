<template>

	<AppHead :title="blog.name + ' - ' + $t('Blogs')" />

	<div v-html="blog.content" class="w-full text-center" />

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';

	const props = defineProps({
		blog: Object,
	});

</script>