<template>

	<AppHead title="Ranking" />

	<div class="px-20">

		<Tabs />

		<div class="bg-white p-10 mb-20 shadow-lg rounded-2xl border border-border-light dark:border-border-dark">

			<div class="grid grid-cols-3 gap-5">

				<Chart
					type="doughnut"
					:data="playerData"
					:options="chartOptions"
					class="w-full"
				/>

				<Chart
					type="polarArea"
					:data="classData"
					:options="chart2Options"
					class="w-full"
				/>

				<Chart
					type="doughnut"
					:data="onlineData"
					:options="chartOptions"
					class="w-full"
				/>

			</div>

		</div>

	</div>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import Tabs from './Tabs.vue';
	import Chart from 'primevue/chart';
	import { ref, onMounted } from "vue";

	const playerData = ref(), classData = ref(), onlineData = ref(), chartOptions = ref();
	onMounted(() => {

		playerData.value = setChartData('player');
		classData.value = setChartData('class');
		onlineData.value = setChartData('online');
		chartOptions.value = setChartOptions();

	});

	const setChartData = (type) => {
		const documentStyle = getComputedStyle(document.body);

		if (type == 'player') {

			return {
				labels: [
					'Total Accounts',
					'Total Characters',
				],
				datasets: [
					{
						data: [
							props.totalAccounts,
							props.totalCharacters,
						],
						backgroundColor: [
							documentStyle.getPropertyValue('--cyan-500'),
							documentStyle.getPropertyValue('--orange-500'),
						],
						hoverBackgroundColor: [
							documentStyle.getPropertyValue('--cyan-400'),
							documentStyle.getPropertyValue('--orange-400'),
						],
					}
				]
			};

		} else if (type == 'class') {

			return {
				labels: [
					'Total Trojan',
					'Total Warrior',
					'Total Archer',
					'Total Ninja',
					'Total Monk',
					'Total Pirate',
					'Total Dragon Warrior',
					'Total Water Taoist',
					'Total Fire Taoist',
					'Total Windwalker',
				],
				datasets: [
					{
						data: [
							props.totalTrojan,
							props.totalWarrior,
							props.totalArcher,
							props.totalNinja,
							props.totalMonk,
							props.totalPirate,
							props.totalDragonWarrior,
							props.totalWaterTaoist,
							props.totalFireTaoist,
							props.totalWindwalker,
						],
						backgroundColor: [
							documentStyle.getPropertyValue('--bluegray-500'),
							documentStyle.getPropertyValue('--red-500'),
							documentStyle.getPropertyValue('--green-500'),
							documentStyle.getPropertyValue('--purple-500'),
							documentStyle.getPropertyValue('--red-500'),
							documentStyle.getPropertyValue('--gray-500'),
							documentStyle.getPropertyValue('--yellow-500'),
							documentStyle.getPropertyValue('--blue-500'),
							documentStyle.getPropertyValue('--pink-500'),
							documentStyle.getPropertyValue('--cyan-500'),
						],
						hoverBackgroundColor: [
							documentStyle.getPropertyValue('--bluegray-400'),
							documentStyle.getPropertyValue('--orange-400'),
							documentStyle.getPropertyValue('--green-400'),
							documentStyle.getPropertyValue('--purple-400'),
							documentStyle.getPropertyValue('--orange-400'),
							documentStyle.getPropertyValue('--gray-400'),
							documentStyle.getPropertyValue('--yellow-400'),
							documentStyle.getPropertyValue('--blue-400'),
							documentStyle.getPropertyValue('--pink-400'),
							documentStyle.getPropertyValue('--cyan-400'),
						],
					}
				]
			};

		} else if (type == 'online') {

			return {
				labels: [
					'Total Online',
					'Total Offline',
				],
				datasets: [
					{
						data: [
							props.totalOnline,
							props.totalOffline,
						],
						backgroundColor: [
							documentStyle.getPropertyValue('--green-500'),
							documentStyle.getPropertyValue('--red-500'),
						],
						hoverBackgroundColor: [
							documentStyle.getPropertyValue('--green-400'),
							documentStyle.getPropertyValue('--red-400'),
						],
					}
				]
			};

		}
	};

	const setChartOptions = () => {
		const documentStyle = getComputedStyle(document.documentElement);
		const textColor = documentStyle.getPropertyValue('--text-color');

		return {
			plugins: {
				legend: {
					labels: {
						usePointStyle: true,
						color: textColor
					}
				}
			}
		};
	};

	const props = defineProps({
		totalAccounts: Number,
		totalCharacters: Number,
		totalTrojan: Number,
		totalWarrior: Number,
		totalArcher: Number,
		totalNinja: Number,
		totalMonk: Number,
		totalPirate: Number,
		totalDragonWarrior: Number,
		totalWaterTaoist: Number,
		totalFireTaoist: Number,
		totalWindwalker: Number,
		totalOnline: Number,
		totalOffline: Number,
	});

</script>