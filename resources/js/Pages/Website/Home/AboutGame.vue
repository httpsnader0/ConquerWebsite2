<template>

	<section class="w-full mb-20">

		<Title :title="$t('About Game')" />

		<div class="grid grid-cols-2 gap-24">

			<iframe
				class="w-full h-[400px] -rotate-2 rounded-2xl overflow-hidden border-4 border-border-light dark:border-border-dark !shadow-xl"
				:src="video"
				title="YouTube video player"
				frameborder="0"
				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
				referrerpolicy="strict-origin-when-cross-origin"
				allowfullscreen
			/>

			<ul class="list-disc grid grid-cols-2 text-gray-500">
				<template
					v-for="(about, index) in abouts"
					:key="index"
				>
					<li
						class="w-full"
						v-text="about.title[$page.props.locale]"
					/>
				</template>
			</ul>

		</div>

	</section>

</template>

<script setup>

	import Title from '@/Layouts/Website/Components/Title.vue';

	const props = defineProps({
		video: String,
		abouts: Object,
	});

</script>