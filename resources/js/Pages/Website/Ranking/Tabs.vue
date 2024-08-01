<template>

	<div class="w-full flex flex-wrap justify-center items-center gap-1 mb-5">

		<template
			v-for="(rank, index) in rankings"
			:key="index"
		>
			<Link :href="route(rank.url)">
			<Button
				:severity="route().current() == rank.url ? 'primary' : 'secondary'"
				:label="$t(rank.title)"
				class=" text-nowrap"
			/>
			</Link>
		</template>

	</div>

</template>

<script setup>

	const rankings = [
		{
			title: 'General Statiscs',
			url: 'website.ranking.index',
			active: 'Website/Ranking',
		},
		{
			title: 'Nobility Rank',
			url: 'website.ranking.nobility',
			active: 'Website/Ranking/NobilityRank',
		},
		{
			title: 'Top Class',
			url: 'website.ranking.class',
			active: 'Website/Ranking/TopClass',
		},
		{
			title: 'Top CPs',
			url: 'website.ranking.cps',
			active: 'Website/Ranking/TopCPs',
		},
		{
			title: 'Top Money',
			url: 'website.ranking.money',
			active: 'Website/Ranking/TopMoney',
		},
		{
			title: 'Top Guilds',
			url: 'website.ranking.guilds',
			active: 'Website/Ranking/TopGuilds',
		},
		{
			title: 'Top PK',
			url: 'website.ranking.pk',
			active: 'Website/Ranking/TopPK',
		},
		{
			title: 'Top Online Points',
			url: 'website.ranking.online-points',
			active: 'Website/Ranking/TopOnlinePoints',
		},
		{
			title: 'Top Event Points',
			url: 'website.ranking.event-points',
			active: 'Website/Ranking/TopEventPoints',
		},
		{
			title: 'Top Monster Points',
			url: 'website.ranking.monster-points',
			active: 'Website/Ranking/TopMonsterPoints',
		},
	];

</script>