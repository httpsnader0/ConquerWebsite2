<template>

	<header :class="$page.component.startsWith('Website/Home') ? 'h-[700px]' : 'h-[400px]'">

		<Swiper
			v-if="$page.component.startsWith('Website/Home')"
			:modules="modules"
			:slides-per-view="1"
			:space-between="0"
			:loop="true"
			navigation
			:pagination="{ clickable: true }"
			:scrollbar="{ draggable: false }"
			:autoplay="{ delay: 3000, disableOnInteraction: false }"
			effect="fade"
		>
			<SwiperSlide
				v-for="(slider, index) in $page.props.settings.sliders"
				:key="index"
			>

				<Link
					:href="slider.url ?? ''"
					class="w-full h-full relative flex justify-center items-center gap-10 bg-center bg-no-repeat bg-cover"
					:class="!slider.url ? 'cursor-default' : 'cursor-pointer'"
					:style="`background-image: url(${slider.image})`"
				>

				<div class="header-overlay" />

				<span
					class="text-6xl text-center text-white text-shadow-lg shadow-black font-bold"
					v-html="slider.text[$page.props.locale]"
				/>

				</Link>

			</SwiperSlide>
		</Swiper>

		<div
			v-else
			class="w-full h-full relative overflow-hidden mb-20 flex justify-center items-center bg-headerBG bg-center bg-cover bg-no-repeat"
		>

			<span
				class="text-6xl text-center text-webPrimary text-shadow-lg shadow-black uppercase font-bold"
				v-html="title"
			/>

		</div>

	</header>

</template>

<script setup>

	import { Autoplay, Navigation, Pagination, EffectFade } from 'swiper/modules';
	import { Swiper, SwiperSlide } from 'swiper/vue';
	import 'swiper/scss';
	import 'swiper/scss/navigation';
	import 'swiper/scss/pagination';
	import 'swiper/scss/effect-fade';
	import { computed } from 'vue';
	import { usePage } from '@inertiajs/vue3';

	const modules = [Autoplay, Navigation, Pagination, EffectFade];

	const title = computed(() => {
		if (usePage().component.startsWith('Website/Signup')) {
			return 'Signup';
		} else if (usePage().component.startsWith('Website/Download')) {
			return 'Download';
		} else if (usePage().component.startsWith('Website/Store')) {
			return 'Store';
		} else if (usePage().component.startsWith('Website/Ranking/Nobility')) {
			return 'Nobility Rank';
		} else if (usePage().component.startsWith('Website/Ranking/Class')) {
			return 'Top Class';
		} else if (usePage().component.startsWith('Website/Ranking/CPs')) {
			return 'Top CPs';
		} else if (usePage().component.startsWith('Website/Ranking/Money')) {
			return 'Top Money';
		} else if (usePage().component.startsWith('Website/Ranking/Guild')) {
			return 'Top Guilds';
		} else if (usePage().component.startsWith('Website/Ranking/PK')) {
			return 'Top PK';
		} else if (usePage().component.startsWith('Website/Ranking/OnlinePoint')) {
			return 'Top Online Points';
		} else if (usePage().component.startsWith('Website/Ranking/EventPoint')) {
			return 'Top Event Points';
		} else if (usePage().component.startsWith('Website/Ranking/MonsterPoint')) {
			return 'Top Monster Points';
		} else if (usePage().component.startsWith('Website/Ranking')) {
			return 'General Statics';
		} else if (usePage().component.startsWith('Website/Event/Show')) {
			return usePage().props.event.name;
		} else if (usePage().component.startsWith('Website/Event')) {
			return 'Event & Tournaments';
		} else if (usePage().component.startsWith('Website/Blog/Show')) {
			return usePage().props.blog.name;
		} else if (usePage().component.startsWith('Website/Blog')) {
			return 'Latest News';
		} else if (usePage().component.startsWith('Website/Media')) {
			return 'Media';
		} else if (usePage().component.startsWith('Website/ContactUs')) {
			return 'Contact Us';
		}
	});

</script>