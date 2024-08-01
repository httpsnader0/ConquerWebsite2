<template>

	<AppHead title="Home" />

	<AboutGame
		:video="video"
		:abouts="abouts"
	/>

	<GameFeature :features="features" />

	<GameStatic
		:totalAccounts="totalAccounts"
		:totalCharacters="totalCharacters"
		:totalVisits="totalVisits"
		:totalOnline="totalOnline"
	/>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import AboutGame from './AboutGame.vue';
	import GameFeature from './GameFeature.vue';
	import GameStatic from './GameStatic.vue';

	const props = defineProps({
		video: String,
		abouts: Object,
		features: Object,
		totalAccounts: Number,
		totalCharacters: Number,
		totalVisits: Number,
		totalOnline: Number,
	});

</script>