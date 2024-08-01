<template>

	<Head :title="title + ' - ' + $page.props.settings.title[$page.props.locale]">

		<link
			rel="shortcut icon"
			:href="asset($page.props.settings.icon)"
		/>

		<meta
			name="description"
			content=""
		/>

		<meta
			name="keywords"
			content=""
		/>

	</Head>

</template>

<script setup>

	const props = defineProps({
		title: String,
	});

</script>