<template>

	<section class="w-full mb-20">

		<Title :title="$t('Our Statics')" />

		<div class="grid grid-cols-4 gap-5">

			<template
				v-for="(staticz, index) in statics"
				:key="index"
			>
				<div class="w-full h-48 flex justify-center items-center text-center">
					<div class="w-full h-full flex flex-col justify-center items-center text-center bg-staticBG bg-contain bg-no-repeat bg-center">
						<span class="text-lg  uppercase text-webSecondary" v-text="staticz.title" />
						<span class="text-5xl font-bold text-webSecondary" v-text="staticz.count" />
					</div>
				</div>
			</template>

		</div>

	</section>

</template>

<script setup>

	import Title from '@/Layouts/Website/Components/Title.vue';

	const props = defineProps({
		totalAccounts: Number,
		totalCharacters: Number,
		totalVisits: Number,
		totalOnline: Number,
	});

	const statics = [
		{
			title: 'Total Accounts',
			count: props.totalAccounts,
		},
		{
			title: 'Total Characters',
			count: props.totalCharacters,
		},
		{
			title: 'Total Visits',
			count: props.totalVisits,
		},
		{
			title: 'Total Online',
			count: props.totalOnline,
		},
	];

</script>