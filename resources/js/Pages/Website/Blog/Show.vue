<template>

	<AppHead :title="blog.name + ' - ' + $t('Blogs')" />

	<div
		v-html="blog.content"
		class="panel-content !inline-block w-full text-center"
	/>

	<Title
		:title="$t('Related Blogs')"
		class="mt-20"
	/>

	<div class="flex flex-wrap justify-center mb-5">
		<div
			v-for="(blog, index) in relatedBlogs"
			:key="index"
			class="w-1/3 p-3"
		>
			<Link
				:href="blog.route"
				class="w-full h-[300px] hover:scale-105 hover-animate border-4 border-border-light dark:border-border-dark text-sm rounded-2xl overflow-hidden relative p-5 flex flex-col justify-end items-center gap-3 text-start !shadow-lg"
			>

			<img
				:src="blog.image"
				:alt="blog.name"
				class="absolute top-0 left-0 w-full h-full"
			/>

			<div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent to-black bg-opacity-50" />

			<span
				v-text="blog.name"
				class="text-primary text-2xl relative"
			/>

			</Link>
		</div>
	</div>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import Title from '@/Layouts/Website/Components/Title.vue';

	const props = defineProps({
		blog: Object,
		relatedBlogs: Object,
	});

</script>