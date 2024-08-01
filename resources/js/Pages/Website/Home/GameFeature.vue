<template>

	<section class="w-full mb-20">

		<Title :title="$t('Game Features')" />

		<div class="grid grid-cols-3 gap-5">

			<template
				v-for="(feature, index) in features"
				:key="index"
			>
				<div
					class="w-full h-[300px] hover:scale-105 hover-animate border-4 border-border-light dark:border-border-dark text-sm rounded-2xl overflow-hidden relative p-5 flex flex-col justify-end items-start gap-3 text-start !shadow-lg"
					:class="{
						'row-span-2 !h-full': index == 1,
					}"
				>

					<img
						:src="asset(feature.image)"
						class="absolute top-0 left-0 w-full h-full"
					/>

					<div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent to-black bg-opacity-50" />

					<span
						v-text="feature.title[$page.props.locale]"
						class="text-primary text-2xl relative"
					/>

					<span
						v-text="feature.description[$page.props.locale]"
						class=" relative text-white text-opacity-50"
					/>

				</div>
			</template>

		</div>

	</section>

</template>

<script setup>

	import Title from '@/Layouts/Website/Components/Title.vue';

	const props = defineProps({
		features: Object,
	});

</script>